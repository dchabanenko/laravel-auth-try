<?php

class PaperController extends \BaseController {

	/**
	 * list papers
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
            $papers = Paper::with('rssSource')->simplePaginate(15);
        } else {
            $papers = Paper::where('source','=', $userId)->with('rssSource')->simplePaginate(3);
        }

        return View::make('papers.list', array('papers' => $papers));
	}
}