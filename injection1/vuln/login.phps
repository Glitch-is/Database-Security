<!DOCTYPE html>
<html>
<head>
</head>
<body>
<code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">include&nbsp;</span><span style="color: #DD0000">"config.php"</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$con&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">mysqli_connect</span><span style="color: #007700">(</span><span style="color: #DD0000">"localhost"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"sql1"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"sql1"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"sql1"</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$username&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"username"</span><span style="color: #007700">];<br /></span><span style="color: #0000BB">$password&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"password"</span><span style="color: #007700">];<br /></span><span style="color: #0000BB">$debug&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"debug"</span><span style="color: #007700">];<br /></span><span style="color: #0000BB">$query&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"SELECT&nbsp;*&nbsp;FROM&nbsp;users&nbsp;WHERE&nbsp;username='</span><span style="color: #0000BB">$username</span><span style="color: #DD0000">'&nbsp;AND&nbsp;password='</span><span style="color: #0000BB">$password</span><span style="color: #DD0000">'"</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$result&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">mysqli_query</span><span style="color: #007700">(</span><span style="color: #0000BB">$con</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$query</span><span style="color: #007700">);<br /><br />if&nbsp;(</span><span style="color: #0000BB">intval</span><span style="color: #007700">(</span><span style="color: #0000BB">$debug</span><span style="color: #007700">))&nbsp;{<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;pre&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"username:&nbsp;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$username</span><span style="color: #007700">),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"password:&nbsp;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$password</span><span style="color: #007700">),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"SQL&nbsp;query:&nbsp;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">$query</span><span style="color: #007700">),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br />&nbsp;&nbsp;if&nbsp;(</span><span style="color: #0000BB">mysqli_errno</span><span style="color: #007700">(</span><span style="color: #0000BB">$con</span><span style="color: #007700">)&nbsp;!==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"SQL&nbsp;error:&nbsp;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">htmlspecialchars</span><span style="color: #007700">(</span><span style="color: #0000BB">mysqli_error</span><span style="color: #007700">(</span><span style="color: #0000BB">$con</span><span style="color: #007700">)),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br />&nbsp;&nbsp;}<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;/pre&gt;"</span><span style="color: #007700">;<br />}<br /><br />if&nbsp;(</span><span style="color: #0000BB">mysqli_num_rows</span><span style="color: #007700">(</span><span style="color: #0000BB">$result</span><span style="color: #007700">)&nbsp;!==&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;h1&gt;Login&nbsp;failed.&lt;/h1&gt;"</span><span style="color: #007700">;<br />}&nbsp;else&nbsp;{<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;h1&gt;Logged&nbsp;in!&lt;/h1&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;p&gt;Your&nbsp;flag&nbsp;is:&nbsp;</span><span style="color: #0000BB">$FLAG</span><span style="color: #DD0000">&lt;/p&gt;"</span><span style="color: #007700">;<br />}<br /><br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code>
</body>
</html>
