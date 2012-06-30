<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Simply Spy</title>
<style type="text/css" media="screen">
<!--



body { font: 1em "Lucida Grande",Lucida,Verdana,sans-serif; font-size: 62.5%; line-height: 1;}
input, textarea { font-family: Arial; font-size: 125%; padding: 7px; }
label { display: block; } 
p { margin: 0; margin-bottom: 4px;}
h5 { margin: 0; font-weight: normal; }
a:link,
a:hover,
a:visited {
    color: #fff;
}
#sidebar {
    color: #AFB0B1;
    background: #0D171A;
    float:left;
    margin:0 0 24px;
    padding:15px 10px 10px;
    width:300px;
}

#sidebar ul {
    font-size:1.2em;
    list-style-type:none;
    margin:0;
    padding:0;
    position:relative;
}

.rating {
    background-image:url(http://static.jqueryfordesigners.com/demo/images/simple-spy/info_bar_stars.png);
    background-repeat:no-repeat;
    height:12px;
    text-indent:-900em;
    font-size:1em;
    margin:0 0 9px;
}

.none {
	background-position: 82px 0px;
}

.four {
	background-position: 82px -48px;
}

.five {
	background-position: 82px -60px;
}

.tags {
	color: #fff;
	margin: 0.5em;
}

.tags a,
.tags span {
	background-color: #333839;
	font-size: 0.8em;
	padding: 0.1em 0.8em 0.2em;
}

.tags a:link,
.tags a:visited {
	color: #fff;
	text-decoration: none;	
}

.tags a:hover,
.tags a:active {
	background-color: #3e4448;
	color: #fff;
	text-decoration: none;	
}

#sidebar li {
    height: 90px;
    overflow: hidden;
}

#sidebar li h5 {
    color:#A5A9AB;
    font-size:1em;
    margin-bottom:0.5em;
}

#sidebar li h5 a {
    color:#A5A9AB;
    text-decoration:none;
}

#sidebar li img {
    float:left;
    margin-right:8px;
}

#sidebar li .info {
    color:#3E4548;
    font-size:1em;
}

#sidebar .info a,
#sidebar .info a:visited {
    color:#3E4548;
    text-decoration: none;
}

#sidebar .spyWrapper {
    height: 100%;
    overflow: hidden;
    position: relative;    
}

#sidebar {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}

.tags span,
.tags a {
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
}

a img {
    border: 0;
}

-->
</style>
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script type="text/javascript" charset="utf-8">
$(function () {
    $('ul.spy').simpleSpy();
});

(function ($) {
    
$.fn.simpleSpy = function (limit, interval) {
    limit = limit || 4;
    interval = interval || 4000;
    
    return this.each(function () {
        // 1. setup
            // capture a cache of all the list items
            // chomp the list down to limit li elements
        var $list = $(this),
            items = [], // uninitialised
            currentItem = limit,
            total = 0, // initialise later on
            height = $list.find('> li:first').height();
            
        // capture the cache
        $list.find('> li').each(function () {
            items.push('<li>' + $(this).html() + '</li>');
        });
        
        total = items.length;
        
        $list.wrap('<div class="spyWrapper" />').parent().css({ height : height * limit });
        
        $list.find('> li').filter(':gt(' + (limit - 1) + ')').remove();

        // 2. effect        
        function spy() {
            // insert a new item with opacity and height of zero
            var $insert = $(items[currentItem]).css({
                height : 0,
                opacity : 0,
                display : 'none'
            }).prependTo($list);
                        
            // fade the LAST item out
            $list.find('> li:last').animate({ opacity : 0}, 1000, function () {
                // increase the height of the NEW first item
                $insert.animate({ height : height }, 1000).animate({ opacity : 1 }, 1000);
                
                // AND at the same time - decrease the height of the LAST item
                // $(this).animate({ height : 0 }, 1000, function () {
                    // finally fade the first item in (and we can remove the last)
                    $(this).remove();
                // });
            });
            
            currentItem++;
            if (currentItem >= total) {
                currentItem = 0;
            }
            
            setTimeout(spy, interval)
        }
        
        spy();
    });
};
    
})(jQuery);



</script>
</head>
<body>
    <h1>Simple Spy</h1>

    <div id="sidebar">
        <ul class="spy">
        	<li>
        		<a href="#" title="View round"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/1.png" title="" /></a>
        		<h5><a href="#" title="View round">round</a></h5>
        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit neue's userpage.">neue</a></p>
        		<p class='rating none'>Not Rated</p>

        		<p class="tags"></p>
        	</li>

        	<li>

        		<a href="#" title="View reflet"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/2.png" title="" /></a>
        		<h5><a href="#" title="View reflet">reflet</a></h5>
        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit neue's userpage.">neue</a></p>

        		<p class='rating none'>Not Rated</p>
        		<p class="tags"><a href="#" title='Find more images tagged Tactile'>Tactile</a></p>
        	</li>

        	<li>

        		<a href="#" title="View Kate Moross Little Big Planet"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/3.png" title="" /></a>
        		<h5><a href="#" title="View Kate Moross Little Big Planet">Kate Moross Little Big Planet</a></h5>

        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit neue's userpage.">neue</a></p>
        		<p class='rating four'>Four Stars</p>
        		<p class="tags"><a href="#" title='Find more images tagged Kate Moross'>Kate Moross</a></p>
        	</li>

        	<li>

        		<a href="#" title="View Untitled"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/4.png" title="" /></a>

        		<h5><a href="#" title="View Untitled">Untitled</a></h5>
        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit mike1052's userpage.">mike1052</a></p>
        		<p class='rating none'>Not Rated</p>
        		<p class="tags"></p>
        	</li>

        	<li>

        		<a href="#" title="View My Tutorial's Library"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/5.png" title="" /></a>
        		<h5><a href="#" title="View My Tutorial's Library">My Tutorial's Library</a></h5>
        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit FrancescoOnAir's userpage.">FrancescoOnAir</a></p>
        		<p class='rating five'>Five Stars</p>
        		<p class="tags"></p>

        	</li>

        	<li>

        		<a href="#" title="View Sandy &mdash; your free personal email assistant - Log in"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/6.png" title="" /></a>
        		<h5><a href="#" title="View Sandy &mdash; your free personal email assistant - Log in">Sandy &mdash; your free</a></h5>
        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit John Doe's userpage.">John Doe</a></p>

        		<p class='rating none'>Not Rated</p>

        		<p class="tags"><a href="#" title='Find more images tagged Blue'>Blue</a> <a href="#" title='Find more images tagged I Want Sandy'>I Want Sandy</a></p>

        	</li>

        	<li>
        		<a href="#" title="View Sandy &mdash; your free personal email assistant - Log in"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/7.png" title="" /></a>

        		<h5><a href="#" title="View Sandy &mdash; your free personal email assistant - Log in">Sandy &mdash; your free</a></h5>

        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit John Doe's userpage.">John Doe</a></p>
        		<p class='rating none'>Not Rated</p>
        		<p class="tags"><a href="#" title='Find more images tagged Blue'>Blue</a> <a href="#" title='Find more images tagged I Want Sandy'>I Want Sandy</a></p>

        	</li>

        	<li>

        		<a href="#" title="View Sandy &mdash; your free personal email assistant"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/8.png" title="" /></a>
        		<h5><a href="#" title="View Sandy &mdash; your free personal email assistant">Sandy &mdash; your free</a></h5>
        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit John Doe's userpage.">John Doe</a></p>

        		<p class='rating none'>Not Rated</p>
        		<p class="tags"><a href="#" title='Find more images tagged Blue'>Blue</a> <a href="#" title='Find more images tagged Homepage'>Homepage</a></p>

        	</li>

        	<li>
        		<a href="#" title="View Values of n Blog"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/9.png" title="" /></a>
        		<h5><a href="#" title="View Values of n Blog">Values of n Blog</a></h5>

        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit John Doe's userpage.">John Doe</a></p>
        		<p class='rating none'>Not Rated</p>

        		<p class="tags"><a href="#" title='Find more images tagged Brown'>Brown</a> <a href="#" title='Find more images tagged Blogs'>Blogs</a></p>

        	</li>

        	<li>
        		<a href="#" title="View why values of n"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/10.png" title="" /></a>
        		<h5><a href="#" title="View why values of n">why values of n</a></h5>
        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit John Doe's userpage.">John Doe</a></p>

        		<p class='rating none'>Not Rated</p>
        		<p class="tags"><a href="#" title='Find more images tagged Brown'>Brown</a> <a href="#" title='Find more images tagged Values of N'>Values of N</a></p>

        	</li>

        	<li>
        		<a href="#" title="View values of n"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/11.png" title="" /></a>
        		<h5><a href="#" title="View values of n">values of n</a></h5>

        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit John Doe's userpage.">John Doe</a></p>
        		<p class='rating none'>Not Rated</p>

        		<p class="tags"><a href="#" title='Find more images tagged Brown'>Brown</a> <a href="#" title='Find more images tagged Homepage'>Homepage</a></p>

        	</li>

        	<li>

        		<a href="#" title="View stikkit privacy policy"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/12.png" title="" /></a>
        		<h5><a href="#" title="View stikkit privacy policy">stikkit privacy policy</a></h5>

        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit John Doe's userpage.">John Doe</a></p>
        		<p class='rating none'>Not Rated</p>
        		<p class="tags"><a href="#" title='Find more images tagged Yellow'>Yellow</a> <a href="#" title='Find more images tagged Blue'>Blue</a></p>

        	</li>

        	<li>

        		<a href="#" title="View stikkit: the stikkit api"><img width="70" height="70" src="http://static.jqueryfordesigners.com/demo/images/simple-spy/13.png" title="" /></a>
        		<h5><a href="#" title="View stikkit: the stikkit api">stikkit: the stikkit api</a></h5>
        		<p class="info">Nov 29th 2008 by <a href="#" title="Visit John Doe's userpage.">John Doe</a></p>
        		<p class='rating none'>Not Rated</p>

        		<p class="tags"><a href="#" title='Find more images tagged Yellow'>Yellow</a> <a href="#" title='Find more images tagged Blue'>Blue</a></p>

        	</li>
        </ul>
    </div>    
</body>
</html>
