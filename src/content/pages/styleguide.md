---
title: Styleguide
summary: This document is a guide to the mark-up styles used throughout the site.
hidden: true
---

## Sections

The main page header of this guide is an `h1` element. Any header elements may include links, as depicted in the example.

The secondary header above is an `h2` element, which may be used for any form of important page-level header. More than one may be used per page. Consider using an `h2` unless you need a header level of less importance, or as a sub-header to an existing `h2` element.

### Third-Level Header

The header above is an `h3` element, which may be used for any form of page-level header which falls below the `h2` header in a document hierarchy.

#### Fourth-Level Header

The header above is an `h4` element, which may be used for any form of page-level header which falls below the `h3` header in a document hierarchy.

##### Fifth-Level Header

The header above is an `h5` element, which may be used for any form of page-level header which falls below the `h4` header in a document hierarchy.

###### Sixth-Level Header

The header above is an `h6` element, which may be used for any form of page-level header which falls below the `h5` header in a document hierarchy.

## Grouping content

### Paragraphs

All paragraphs are wrapped in `p` tags. Additionally, `p` elements can be wrapped with a `blockquote` element _if the `p` element is indeed a quote_. Historically, `blockquote` has been used purely to force indents, but this is now achieved using CSS. Reserve `blockquote` for quotes.

### Horizontal rule

The `hr` element represents a paragraph-level thematic break, e.g. a scene change in a story, or a transition to another topic within a section of a reference book. The following extract from <cite>Pandora’s Star</cite> by Peter F. Hamilton shows two paragraphs that precede a scene change and the paragraph that follows it:

* * *

### Pre-formatted text

The `pre` element represents a block of pre-formatted text, in which structure is represented by typographic conventions rather than by elements. Such examples are an e-mail (with paragraphs indicated by blank lines, lists indicated by lines prefixed with a bullet), fragments of computer code (with structure indicated according to the conventions of that language) or displaying <abbr title="American Standard Code for Information Interchange">ASCII</abbr> art. Here’s an example showing the printable characters of <abbr>ASCII</abbr>:

<pre><samp>! " # $ % & ' * + , - . /
0 1 2 3 4 5 6 7 8 9
@ A B C D E F G H I J K L M N O
P Q R S T U V W X Y Z \ ^ _
` a b c d e f g h i j k l m n o
p q r s t u v w x y z ~</samp></pre>

### Blockquotes

The `blockquote` element represents a section that is being quoted from another source.

> Many forms of Government have been tried, and will be tried in this world of sin and woe. No one pretends that democracy is perfect or all-wise. Indeed, it has been said that democracy is the worst form of government except all those other forms that have been tried from time to time.

Winston Churchill, in <cite>[a speech to the House of Commons](http://hansard.millbanksystems.com/commons/1947/nov/11/parliament-bill#column_206)</cite>. 11th November 1947

Additionally, you might wish to cite the source, as in the above example. The correct method involves including the `cite` attribute on the `blockquote` element, but since no browser makes any use of that information, it’s useful to link to the source also.

### Ordered list

The `ol` element denotes an ordered list, and various numbering schemes are available through the CSS (including 1,2,3… a,b,c… i,ii,iii… and so on). Each item requires a surrounding `<li>` and `</li>` tag, to denote individual items within the list (as you may have guessed, `li` stands for list item).

1. This is an ordered list.
2. This is the second item, which contains a sub list
    1.  This is the sub list, which is also ordered.
    2.  It has two items.
3. This is the final item on this list.

### Unordered list

The `ul` element denotes an unordered list (ie. a list of loose items that don’t require numbering, or a bulleted list). Again, each item requires a surrounding `<li>` and `</li>` tag, to denote individual items. Here is an example list showing the constituent parts of the British Isles:

* United Kingdom of Great Britain and Northern Ireland:
  * England
  * Scotland
  * Wales
  * Northern Ireland
* Republic of Ireland
* Isle of Man
* Channel Islands:
  * Bailiwick of Guernsey
  * Bailiwick of Jersey

Sometimes we may want each list item to contain block elements, typically a paragraph or two.

* The British Isles is an archipelago consisting of the two large islands of Great Britain and Ireland, and many smaller surrounding islands.

* Great Britain is the largest island of the archipelago. Ireland is the second largest island of the archipelago and lies directly to the west of Great Britain.

* The full list of islands in the British Isles includes over 1,000 islands, of which 51 have an area larger than 20 km<sup>2</sup>.

### Definition list

The `dl` element is for another type of list called a definition list. Instead of list items, the content of a `dl` consists of `dt` (Definition Term) and `dd` (Definition description) pairs. Though it may be called a “definition list”, `dl` can apply to other scenarios where a parent/child relationship is applicable. For example, it may be used for marking up dialogues, with each `dt` naming a speaker, and each `dd` containing his or her words.

This is a term.
: This is the definition of that term, which both live in a `dl`.

Here is another term.
: And it gets a definition too, which is this line.

Here is term that shares a definition with the term below.
: Here is a defined term.
: `dt` terms may stand on their own without an accompanying `dd`, but in that case they _share_ descriptions with the next available `dt`. You may not have a `dd` without a parent `dt`.

### Figures

Figures are usually used to refer to images:

<figure>

  ![Matt, Gaz, Si, Paul & Andy](https://pbs.twimg.com/media/ESYWBOyXsAATXxV?format=jpg&name=large)

  <figcaption>The gang smiling after pizza<figcaption>
</figure>

Here, a part of a poem is marked up using figure:

<figure>

  ‘Twas brillig, and the slithy toves  
  Did gyre and gimble in the wabe;  
  All mimsy were the borogoves,  
  And the mome raths outgrabe.

  <figcaption><cite>Jabberwocky</cite> (first verse). Lewis Carroll, 1832-98</figcaption>
</figure>

## Text-level Semantics

There are a number of inline <abbr title="HyperText Markup Language">HTML</abbr> elements you may use anywhere within other elements.

### Links and anchors

The `a` element is used to hyperlink text, be that to another page, a named fragment on the current page or any other location on the web. Example:

[Go to the home page](/).

### Stressed emphasis

The `em` element is used to denote text with stressed emphasis, i.e., something you’d pronounce differently. Where italicizing is required for stylistic differentiation, the `i` element may be preferable. Example:

You simply _must_ try the negitoro maki!

### Strong importance

The `strong` element is used to denote text with strong importance. Where bolding is used for stylistic differentiation, the `b` element may be preferable. Example:

**Don’t** stick nails in the electrical outlet.

### Strikethrough

The `s` element is used to represent content that is no longer accurate or relevant. When indicating document edits i.e., marking a span of text as having been removed from a document, use the `del` element instead. Example:

~~Recommended retail price: £3.99 per bottle~~  
**Now selling for just £2.99 a bottle!**

### Citations

The `cite` element is used to represent the title of a work (e.g. a book, essay, poem, song, film, TV show, sculpture, painting, musical, exhibition, etc). This can be a work that is being quoted or referenced in detail (i.e. a citation), or it can just be a work that is mentioned in passing. Example:

<cite>Universal Declaration of Human Rights</cite>, United Nations, December 1948\. Adopted by General Assembly resolution 217 A (III).

### Inline quotes

The `q` element is used for quoting text inline. Example showing nested quotations:

John said, <q>I saw Lucy at lunch, she told me <q>Mary wants you to get some ice cream on your way home</q>. I think I will get some at Ben and Jerry’s, on Gloucester Road.</q>

### Definition

The `dfn` element is used to highlight the first use of a term. The `title` attribute can be used to describe the term. Example:

Bob’s <dfn title="Dog">canine</dfn> mother and <dfn title="Horse">equine</dfn> father sat him down and carefully explained that he was an <dfn title="A mutation that combines two or more sets of chromosomes from different species">allopolyploid</dfn> organism.

### Abbreviation

The `abbr` element is used for any abbreviated text, whether it be acronym, initialism, or otherwise. Generally, it’s less work and useful (enough) to mark up only the first occurrence of any particular abbreviation on a page, and ignore the rest. Any text in the `title` attribute will appear when the user’s mouse hovers the abbreviation (although notably, this does not work in Internet Explorer for Windows). Example abbreviations:

<abbr title="British Broadcasting Corportation">BBC</abbr>, <abbr title="HyperText Markup Language">HTML</abbr>, and <abbr title="Staffordshire">Staffs.</abbr>

### Time

The `time` element is used to represent either a time on a 24 hour clock, or a precise date in the proleptic Gregorian calendar, optionally with a time and a time-zone offset. Example:

Queen Elizabeth II was proclaimed sovereign of each of the Commonwealth realms on <time datetime="1952-02-6">6</time> and <time datetime="1952-02-7">7 February 1952</time>, after the death of her father, King George VI.

### Code

The `code` element is used to represent fragments of computer code. Useful for technology-oriented sites, not so useful otherwise. Example:

When you call the `activate()` method on the `robotSnowman` object, the eyes glow.

Used in conjunction with the `pre` element:

    function getJello() {
      echo $aDeliciousSnack;
    }

### Variable

The `var` element is used to denote a variable in a mathematical expression or programming context, but can also be used to indicate a placeholder where the contents should be replaced with your own value. Example:

If there are <var>n</var> pipes leading to the ice cream factory then I expect at _least_ <var>n</var> flavours of ice cream to be available for purchase!

### Italicised

The `i` element is used for text in an alternate voice or mood, or otherwise offset from the normal prose. Examples include taxonomic designations, technical terms, idiomatic phrases from another language, the name of a ship or other spans of text whose typographic presentation is typically italicised. Example:

There is a certain _je ne sais quoi_ in the air.

### Emboldened

The `b` element is used for text stylistically offset from normal prose without conveying extra importance, such as key words in a document abstract, product names in a review, or other spans of text whose typographic presentation is typically emboldened. Example:

You enter a small room. Your **sword** glows brighter. A **rat** scurries past the corner wall.

### Marked or highlighted text

The `mark` element is used to represent a run of text marked or highlighted for reference purposes. When used in a quotation it indicates a highlight not originally present but added to bring the reader’s attention to that part of the text. When used in the main prose of a document, it indicates a part of the document that has been highlighted due to its relevance to the user’s current activity. Example:

I also have some <mark>kitten</mark>s who are visiting me these days. They’re really cute. I think they like my garden! Maybe I should adopt a <mark>kitten</mark>.

### Edits

The `del` element is used to represent deleted or retracted text which still must remain on the page for some reason. Meanwhile its counterpart, the `ins` element, is used to represent inserted text. Both `del` and `ins` have a `datetime` attribute which allows you to include a timestamp directly in the element. Example inserted text and usage:

She bought <del datetime="2005-05-30T13:00:00">two</del> <ins datetime="2005-05-30T13:00:00">five</ins> pairs of shoes.

## Tabular data

Tables should be used when displaying tabular data. The `thead`, `tfoot` and `tbody` elements enable you to group rows within each a table.

If you use these elements, you must use every element. They should appear in this order: `thead`, `tfoot` and `tbody`, so that browsers can render the foot before receiving all the data. You must use these tags within the table element.

<div class="example">

<table><caption>The Very Best Eggnog</caption> <colgroup><col style="width:15em;"> <col style="width:6em;"> <col style="width:6em;"></colgroup> 

<thead>

<tr>

<th scope="col">Ingredients</th>

<th scope="col">Serves 12</th>

<th scope="col">Serves 24</th>

</tr>

</thead>

<tbody>

<tr>

<td>Milk</td>

<td>1 quart</td>

<td>2 quart</td>

</tr>

<tr>

<td>Cinnamon Sticks</td>

<td>2</td>

<td>1</td>

</tr>

<tr>

<td>Vanilla Bean, Split</td>

<td>1</td>

<td>2</td>

</tr>

<tr>

<td>Cloves</td>

<td>5</td>

<td>10</td>

</tr>

<tr>

<td>Mace</td>

<td>10 blades</td>

<td>20 blades</td>

</tr>

<tr>

<td>Egg Yolks</td>

<td>12</td>

<td>24</td>

</tr>

<tr>

<td>Cups Sugar</td>

<td>1 ½ cups</td>

<td>3 cups</td>

</tr>

<tr>

<td>Dark Rum</td>

<td>1 ½ cups</td>

<td>3 cups</td>

</tr>

<tr>

<td>Brandy</td>

<td>1 ½ cups</td>

<td>3 cups</td>

</tr>

<tr>

<td>Vanilla</td>

<td>1 tbsp</td>

<td>2 tbsp</td>

</tr>

<tr>

<td>Half-and-half or Light Cream</td>

<td>1 quart</td>

<td>2 quart</td>

</tr>

<tr>

<td>Freshly grated nutmeg to taste</td>

<td></td>

<td></td>

</tr>

</tbody>

</table>

</div>

<small>Shamelessly stolen from Paul Robert Lloyd. Parts of this markup guide attributable to [Dave Shea](http://www.mezzoblue.com/), and licensed under a [Creative Commons License](https://creativecommons.org/licenses/by-sa/2.0/uk/).</small>
