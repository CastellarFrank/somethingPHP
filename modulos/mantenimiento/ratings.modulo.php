<div class="page-header">
    <div class="icon">
        <span class="ico-arrow-right"></span>
    </div>
    <h1>RATINGS TABLE<small>Tables Managment</small></h1>
</div>
<div class="getIn">
    <div class="tableSpane">
        <div class="block">
            <div id="workArea">
                <div class="head dblue">
                    <div class="icon"><span class="ico-layout-9"></span></div>
                    <h2>Ratings</h2>
                    <ul class="buttons">
                        <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                                                        
                </div>                
            </div>
            <div id = "myTable" class="data-fluid">                    
                        <!--CÓDIGO PHP POR ACÁ :D-->
                        <?php
                            showTableData("ratings");
                        ?>
                    
                </table>
            </div>
        </div>  
    </div>
</div>
<script type="text/javascript">

</script>