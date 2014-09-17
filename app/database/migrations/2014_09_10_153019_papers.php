<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Papers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('papers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('address'); //Publisher's address (usually just the city, but can be the full address for lesser-known publishers)
            $table->string('annote', 300);// An annotation for annotated bibliography styles (not typical)
            $table->string('author'); //The name(s) of the author(s) (in the case of more than one author, separated by and)
            $table->string('booktitle'); //The title of the book, if only part of it is being cited
            $table->integer('chapter'); //The chapter number
            $table->string('crossref'); //The key of the cross-referenced entry
            $table->string('edition'); //The edition of a book, long form (such as "First" or "Second")
            $table->string('editor'); //The name(s) of the editor(s)
            $table->string('eprint'); //A specification of an electronic publication, often a preprint or a technical report
            $table->string('howpublished'); //How it was published, if the publishing method is nonstandard
            $table->string('institution'); // The institution that was involved in the publishing, but not necessarily the publisher
            $table->string('journal'); // The journal or magazine the work was published in
            $table->string('key'); // A hidden field used for specifying or overriding the alphabetical order of entries (when the "author" and "editor" fields are missing). Note that this is very different from the key (mentioned just after this list) that is used to cite or cross-reference the entry.
            $table->string('month'); // The month of publication (or, if unpublished, the month of creation)
            $table->string('note'); // Miscellaneous extra information
            $table->integer('number'); //The "(issue) number" of a journal, magazine, or tech-report, if applicable. (Most publications have a "volume", but no "number" field.)
            $table->string('organization'); //The conference sponsor
            $table->string('pages'); //Page numbers, separated either by commas or double-hyphens.
            $table->string('publisher'); //The publisher's name
            $table->string('school'); //The school where the thesis was written
            $table->string('series'); //The series of books the book was published in (e.g. "The Hardy Boys" or "Lecture Notes in Computer Science")
            $table->string('title'); //The title of the work
            $table->string('type'); //The field overriding the default type of publication (e.g. "Research Note" for techreport, "{PhD} dissertation" for phdthesis, "Section" for inbook/incollection)
            $table->string('url'); //The WWW address
            $table->integer('volume'); //The volume of a journal or multi-volume book
            $table->integer('year'); //The year of publication (or, if unpublished, the year of creation)
            $table->integer('source'); // feed link, from which this record was imported
            $table->string('hash');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('papers');
	}

}
