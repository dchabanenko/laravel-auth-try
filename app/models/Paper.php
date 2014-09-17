<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Paper extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'papers';

    /**
     * Parse new records from the source
     *
     * @param int $sourceId
     */
    public static function parseNewRecords($sourceId)
    {
        $source = RssSource::find($sourceId);
        $structdata = simplexml_load_file($source->url);
        $newsArray = $structdata->item;
        $hashesArray = array();
        $itemsArray = array();
        for ($j = 0; $j< count($newsArray); $j++) {
            $item = new RssSource();
            $xmlItem = new SimpleXmlElement(str_replace('rdf:', '',str_replace('dc:creator','author',$newsArray[$j]->asXml())));
            $item->title = $xmlItem->title->__toString();
            $item->annote = $xmlItem->description->__toString();
            $item->hash = hash ('md5', $item->title.$item->annote, false);
            $item->url = $xmlItem->link;
            $item->author = trim(strip_tags($xmlItem->author));
            $item->source = $sourceId;
            array_push($hashesArray,$item->hash);
            $itemsArray[$item->hash] = $item->toArray();
        }
        $repeatedPapers = DB::table('papers')
            ->whereIn('hash', $hashesArray)
            ->lists('hash');
        $newHashes = array_diff($hashesArray, $repeatedPapers);
        $items2insert = array();
        foreach ($newHashes as $hash2insert) {
            array_push($items2insert, $itemsArray[$hash2insert]);
        }
        if (!empty($items2insert)) {
            DB::table('papers')->insert($items2insert);
        }
    }

}
