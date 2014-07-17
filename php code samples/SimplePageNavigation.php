
<?php 

//If you use it, please link to my site 
$full_path = getenv("REQUEST_URI"); 
//put the base URL in case you need it 
$base = "http://subomain.domain.ext"; 
//Get the name of the file 
$page_file = basename($full_path); 
//The files are named file_1.php, file_2.php, etc. Extract number from it. 
$page_num = substr($page_file 
    , strrpos($page_file, "_") + 1 
    , strpos($page_file, ".php") - strrpos($page_file, "_") - 1 
); 
$partial_path = substr($page_file, 0, strrpos($page_file, "_")); 
//Build array of pagenumbers. Here are ten pages. 
$all_pages = array (1,2,3,4,5,6,7,8,9,10); 

foreach ($all_pages as $all_page) 
{ 
//Create link to all the previus pages and put in prev-image. 
    if ($all_page < $page_num) 
        { 
        print "<a href=\"$partial_path"."_". $all_page . ".php\"><img src=\"images/prev.gif\" alt=\"$all_page\" border=\"0\"></a>"; 
        } 
//Create I-am-here-image. 
    elseif ($all_page == $page_num) 
        { 
        print "<img src=\"images/here.gif\" alt=\"$page_num\" border=\"0\">"; 
        } 
//Create links to all the next pages and put in next-image. 
    else 
        { 
        print "<a href=\"$partial_path"."_" . $all_page . ".php\"><img src=\"images/next.gif\" alt=\"$all_page\" border=\"0\"></a>"; 
        } 
} 

?> 

