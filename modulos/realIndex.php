<!DOCTYPE html>
<html lang="es">
<head>        
    <!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />-->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
    <title>Aries - Metro Style Admin Panel</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 7]>
        <link href="css/ie.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='js/plugins/other/lte-ie7.js'></script>
    <![endif]-->    
    <script type='text/javascript' src='js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>

    <!--Barras Naranjas pequeñas-->
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>

    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>

    <script type='text/javascript' src='js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    
    <script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.js'></script>    
    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>        
    
    <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    
    <script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
    <script type='text/javascript' src='js/plugins/datatables/jquery.dataTables.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushCss.js'></script>    
    <script type='text/javascript' src='js/plugins/fancybox/jquery.fancybox.pack.js'></script>

    <script type='text/javascript' src='js/plugins.js'></script>

    <script type='text/javascript' src='js/myPlugins.js'></script>
    <script type="text/javascript" src="js/myPostCalls.js"></script>
    <script type='text/javascript' src="js/plugins/select/select2.min.js"></script>
    <script type='text/javascript' src='js/plugins/datatables/ColReorderWithResize.js'></script>
    <script type='text/javascript' src='js/plugins/datatables/ColVis.min.js'></script>

    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
</head>
<body>    
    <div id="loader"><img src="img/loader.gif"/></div>
        <div class="body">
            <ul class="navigation">
                <li>
                    <a href="index.php" class="button">
                        <div class="icon">
                            <span class="ico-monitor"></span>
                        </div>                    
                        <div class="name">Inicio</div>
                    </a>                
                </li>
                <li>
                    <a href="#" class="button yellow">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-cog-2"></span>
                        </div>                    
                        <div class="name">UI Elements</div>
                    </a>          
                    <ul class="sub">
                        <li><a href="ui.html">UI Elements</a></li>
                        <li><a href="widgets.html">Widgets</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="grid_system.html">Grid System</a></li>
                    </ul>
                </li>                
                <li>
                    <a href="#" class="button green">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-pen-2"></span>
                        </div>                    
                        <div class="name">Forms Stuff</div>
                    </a>                
                    <ul class="sub">
                        <li><a href="forms.html">Elements</a></li>
                        <li><a href="validation.html">Validation</a ></li>
                        <li><a href="grid.html">Grid</a></li>
                        <li><a href="editor.html">Editors</a></li>
                        <li><a href="wizard.html">Wizard</a></li>
                    </ul>                    
                </li>                        
                <li>
                    <a href="statistic.html" class="button red">
                        <div class="icon">
                            <span class="ico-chart-4"></span>
                        </div>                    
                        <div class="name">Statistic</div>
                    </a>                
                </li>                
                <li>
                    <a href="#" class="button dblue">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-layout-7"></span>
                        </div>                    
                        <div class="name">Tables</div>
                    </a> 
                    <ul class="sub">
                        <li><a href="tables.html">Simple</a></li>
                        <li><a href="tables_dynamic.html">Dynamic</a></li>
                    </ul>                                        
                </li>
                <li>
                    <a href="#" class="button purple">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-box"></span>
                        </div>                    
                        <div class="name">Samples</div>
                    </a>                
                    <ul class="sub">
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="login.html">Login</a></li>
                    </ul>                                        
                </li>
                <li>
                    <a href="#" class="button orange">
                        <div class="arrow"></div>
                        <div class="icon">
                            <span class="ico-cloud"></span>
                        </div>                    
                        <div class="name">Other</div>
                    </a>                
                    <ul class="sub">
                        <li><a href="files.html">File handling</a></li>
                        <li><a href="images.html">Images</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="404.html">Error 404</a></li>
                    </ul>                                        
                </li>                
                <li id="userLi">
                    <div class="user">
                        <img src="img/examples/users/dmitry_m.jpg" align="left"/>
                        <a href="#" class="name">
                            <span><?php ?>Dmitry Ivaniuk</span>
                            <span class="sm">Administrator</span>
                        </a>
                        <div class="buttons">
                            <div class="sbutton blue">
                                <a href="index.php"><span id="btnLogout" class="ico-cogs"></span></a>
                            </div>                        
                        </div>
                    </div>
                </li>                
            </ul>
            
            
            <div class="content">
                <?php
                    modulo("mantenimiento/promociones","promotions","myPromotion");
                ?>
                
            </div>
            
        </div>

        <!-- Bootrstrap modal form -->
        <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">New Promotion Form</h3>
            </div>  
            <span id="spanError"></span>
            <form enctype="multipart/form-data" method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
                <div class="row-fluid">
                    <div class="block-fluid">
                        <div>
                            <div class="row-form">
                                <div class="span12">
                                    <span class="top title">Start Date:</span>
                                    <input type="text" name="startDate" id="startDate" />                        
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span12">
                                    <span class="top title">End Date:</span>
                                    <input type="text" name="endDate" id="endDate"/>
                                </div>
                            </div>    
                        </div>
                        <div>
                            <div class="row-form">
                                <div class="span12">
                                    <span class="top title">Country:</span>
                                    <select id="country" name="country">
                                        <option value="1">Honduras</option>
                                    </select>
                                </div>
                            </div>                
                            <div class="row-form">
                                <div class="span12">
                                    <span class="top title">Select City:</span>
                                    <select id="city" name="city">
                                        <option value="1">San Pedro Sula</option>
                                    </select>
                                </div>
                            </div>                
                        </div>
                        <div display="inline-block";>
                            <div class="left">
                                <div class="span12">
                                    <span class="top title">Image:</span>
                                    <input type="file" name="photo" id="photo">
                                </div>
                            </div>       
                        </div>
                        <div >
                            <div class="span12">
                                <span id="myTitle">Description:</span>
                                <textarea name = "description" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>                   
                <div class="modal-footer">
                    <button class="btn btn-warning"  aria-hidden="true" type = "submit">Create</button>
                    <button class = "btn btn-primary"  data-dismiss="modal" aria-hidden="true" >Close</button>            
                </div>
            </form>
        </div>   
    <div class="dialog" id="source" style="display: none;" title="Source"></div>
    
</body>
</html>
