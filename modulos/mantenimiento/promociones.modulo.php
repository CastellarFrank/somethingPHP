<div class="page-header">
    <div class="icon">
        <span class="ico-arrow-right"></span>
    </div>
    <h1>PROMOTIONS TABLE<small>Tables Managment</small></h1>
</div>
<form enctype="multipart/form-data" method="POST" action="include/postCall_addPromotion.php">
    <div class="row-form" >                                
            <button class="btn btn-warning"  aria-hidden="true" type = "submit">Add New Promotion</button>
        </div>
    <div class="row-fluid">
        <div class="span6">                
            <div class="block">
                <div class="data-fluid">
                    <div class="row-form">
                        <div class="span2">Start Date:</div>
                        <div class="span4"><input class="datepicker" type="text" id="startDate" name="startDate"/></div>
                        <div class="span2">End Date:</div>
                        <div class="span4"><input class="datepicker" type="text" id="endDate" name="endDate"/></div>
                    </div>
                    <div class="row-form">
                        <div class="span2">Country:</div>
                        <div class="span4">
                            <select id="country" name="country" style="width: 100%;">
                                <?=getCountriesOptions();?>
                            </select>
                        </div>
                        <div class="span2">City:</div>
                        <div class="span4">
                            <select id="city" name="city"  style="width: 100%;">
                                <option value="-1">Choose a state first.</option>
                            </select>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span2">State:</div>
                        <div class="span4">
                            <select id="state" name="state" style="width: 100%;">
                                <option value="1">Choose a country first.</option>                                                                                                 
                            </select>
                        </div>
                        <div class="span2">You are: </div>
                        <div class="span4">
                            <input type="text" value="frank@grupoleitz.com" readonly="readonly">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="span6">                
            <div class="block">
                <div class="data-fluid">
                    <div class="row-form">
                        <div class="span3">Select a File:</div>
                        <div class="span9">                            
                            <div class="input-append file">
                                <input type="file" name="photo" id="photo"/>
                                <input type="text"/>
                                <button class="btn">Browse</button>
                            </div>                            
                        </div>
                    </div> 
                    <div class="row-form">
                        <div class="span3">Description:</div>
                        <div class="span9"><textarea id="description" name="description" placeholder="Write a description for the image..."></textarea></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="getIn">
    <div class="tableSpane">
        <div class="block">
            <div id="workArea">
                <div class="head dblue">
                    <div class="icon"><span class="ico-layout-9"></span></div>
                    <h2>Promotions</h2>
                    <ul class="buttons">
                        <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                                                        
                </div>                
            </div>
            <div id = "myTable" class="data-fluid">                    
                        <!--CÓDIGO PHP POR ACÁ :D-->
                        <?php
                            showTableData("promociones");
                        ?>
                    
                </table>
            </div>
        </div>  
    </div>
</div>
<script type="text/javascript">

</script>