</head>

<body>
<div class="container">

    <div id="header">
    	 <div class="disclaimer"><a href="admin.php">Admin</a></div>
        <ul class="topnav">
            <li><a onclick="openbox('otasl');">OTASL</a></li>
			<li><a onclick="openbox('handheld');">Handheld</a></li>
			<li><a onclick="openbox('fermion');">Fermion</a></li>
            <li>
                <a>ARM Tools</a>
                <ul class="subnav">
                    <li><a onclick="openbox('cfp');">CFP</a></li>
                    <li><a onclick="openbox('bootrom');">Bootrom</a></li>
                    <li><a onclick="openbox('usbdriver');">USB Driver</a></li>
                </ul>
            </li>
			<li>
                <a>Carrier Support</a>
                <ul class="subnav">
                    <li><a onclick="openbox('cdlayout');">CD Layout</a></li>
                    <li><a onclick="openbox('hhvxml');" >Handheld VXML</a></li>
                    <li><a onclick="openbox('vsm');" >VSM</a></li>
					<li><a onclick="openbox('simulator');">Simulator</a></li>
                </ul>
            </li>
			<li>
                <a>Desktop Manager</a>
                <ul class="subnav">
                    <li><a onclick="openbox('desktop');">PC</a></li>
                    <li><a onclick="openbox('macdesktop');" >Mac</a></li>
                </ul>
            </li>
			<li>
                <a>BES</a>
                <ul class="subnav">
                    <li><a onclick="openbox('blackberrysmallbusinessserver');">Blackberry Small Business Server</a></li>
                    <li><a onclick="openbox('bes');">BES</a></li>
                </ul>
            </li>
			<li>
                <a>Miscellaneous</a>
                <ul class="subnav">
                    <li><a onclick="openbox('rimsigningauthority');">Signing Authority</a></li>
                    <li><a onclick="openbox('mds');">MDS</a></li>
                </ul>
            </li>
            <li><a href="?type=headrev">headrev</a></li>
        </ul>
    </div>
</div>


<div id="filter"></div>
<br/>
<br/>
<br/>
<br/>

<div id="returned_value"></div>



</body>

</html>
