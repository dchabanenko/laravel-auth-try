<?php

class FeedController extends \BaseController {

	/**
	 * list feeds
     * @param string $filter ("all"|"my")
	 *
	 * @return Response
	 */
	public function index($filter)
	{
        if (Auth::check()) {
            $userId =  Auth::user()->id;
        } else {
            $filter = "all";
        }
        if ($filter == "all") {
            $feeds = RssSource::simplePaginate(3);
        } else {
            $feeds = RssSource::where('creator','=', $userId)->simplePaginate(3);
        }

        return View::make('feeds.list', array('feeds' => $feeds));
	}

    /**
     * delete own feed
     * @param int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        if (Auth::check()) {
            $userId =  Auth::user()->id;
            $feed = RssSource::find($id);
            if ($feed->creator == $userId) {
                $feed->delete();
                return Redirect::back();
            } else {
                return Redirect::back()->with(array('message' => 'Unable to delete not own feed', 'alert-class' => 'alert alert-warning'));
            }
        } else {
            return Redirect::back()->with(array('message' => 'Unauthorized users can\'t delete feeds', 'alert-class' => 'alert alert-warning'));
        }
    }

    /**
     * delete own feed
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $userId =  Auth::user()->id;
            $feed = RssSource::find($id);
            if ($feed->creator == $userId) {
                if (Request::isMethod('post')) {
                    $input = Input::all();
                    $rules = array('url' => 'required|url');
                    $v = Validator::make($input, $rules);
                    if($v->passes()) {
                        $feed->name = $input['name'];
                        $feed->description = $input['description'];
                        $feed->url = $input['url'];
                        $feed->save();
                        return Redirect::to(URL::route('feeds.index', 'all'))->with(array('message' => 'The feed has successfully saved', 'alert-class' => 'alert alert-success'));
                    }
                } else {
                    return View::make('feeds.edit', array('feed' => $feed, 'formCaption' => 'Edit feed'));
                }
            } else {
                return Redirect::back()->with(array('message' => 'Unable to edit not own feed', 'alert-class' => 'alert alert-warning'));
            }
        } else {
            return Redirect::back()->with(array('message' => 'Unauthorized users can\'t delete feeds', 'alert-class' => 'alert alert-warning'));
        }
    }

    public function create()
    {
        if (Auth::check()) {
            $feed = new RssSource();
            if (Request::isMethod('post')) {
                $input = Input::all();
                $rules = array('url' => 'required|url');
                $v = Validator::make($input, $rules);
                if($v->passes()) {
                    $feed->name = $input['name'];
                    $feed->description = $input['description'];
                    $feed->url = $input['url'];
                    $feed->creator = Auth::user()->id;
                    $feed->save();

                    return Redirect::to(URL::route('feeds.index', 'all'))->with(array('message' => 'The feed has successfully added', 'alert-class' => 'alert alert-success'));
                } else {
                    return View::make('feeds.edit', array('feed' => $feed, 'formCaption' => 'Add new feed'));
                }
            } else {
                $feed->name = '';
                $feed->description = '';
                $feed->url = '';

                return View::make('feeds.edit', array('feed' => $feed, 'formCaption' => 'Add new feed'));
            }
        } else {
            return Redirect::back()->with(array('message' => 'Unauthorized users can\'t add feeds', 'alert-class' => 'alert alert-warning'));
        }
    }

    /**
     * delete own feed
     * @param int $id
     *
     * @return Response
     */
    public function refresh($id)
    {
        Paper::parseNewRecords($id);

        return "ok";

    }

}