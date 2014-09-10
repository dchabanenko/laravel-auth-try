<?php

class FeedSourceTableSeeder extends Seeder {

    public function run()
    {
        $feed = new RssSource();
        $feed->name = 'arXiv physics';
        $feed->description = 'feed of arXiv physics papers';
        $feed->creator = 1;// learn to use references
        $feed->url = 'http://export.arxiv.org/rss/physics';
        $feed->save();

        $feed = new RssSource();
        $feed->name = 'arXiv q-fin';
        $feed->description = 'feed of arXiv quantative finance (q-fin)';
        $feed->creator = 1;// learn to use references
        $feed->url = 'http://export.arxiv.org/rss/q-fin';
        $feed->save();
    }
}