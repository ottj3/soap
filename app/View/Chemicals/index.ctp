<!doctype html>
<html>
<!-- chemicals index.ctp -->

<head>
    <?php $this->Html->script('jquery'); ?>
        <script src="<?php echo $this->webroot; ?>/js/userQuery.js"></script>
        <style>
            .details {
                margin-bottom: 25px;
            }
            
            hr {
                border-color: #013435;
                margin: 5px;
            }
            
            h1 {
                font-size: 25px;
            }
            
            h2 {
                font-size: 20px;
            }
            
            h3 {
                font-size: 15px;
            }
            
            h4 {
                font-size: 12px;
            }
            
            a.pageLink {
                color: #037162;
            }
            
            .popup {
                background: rgba(255, 255, 255, 0.8);
                position: fixed;
                display: none;
                z-index: 5000;
                height: 100%;
                width: 100%;
                left: 0;
                top: 0;
            }
            
            .popup > div {
                border-radius: 4px;
                position: fixed;
                background: #FFFFFF;
                box-shadow: 0px 0px 12px #666666;
                padding: 1em 2em 2em;
                width: 80%;
                max-width: 768px;
                z-index: 5001;
                -webkit-transform: translate(-50%, -50%);
                -moz-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                -o-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                left: 50%;
                top: 50%;
                max-height: 70%;
            }
            
            table.popupTable {
                height: 100%;
                border-collapse: collapse;
                width: 100%;
                background-color: #eee;
            }
            
            .popupTable th {
                background-color: darkseagreen;
                font-weight: bold;
            }
            
            .popupTable th,
            .popupTable td {
                line-height: 1.5;
                padding: 0.75em;
                text-align: left;
            }
            /* Stack rows vertically on small screens */
            
            @media (max-width: 30em) {
                /* Hide column labels */
                .popupTable thead tr {
                    position: absolute;
                    top: -9999em;
                    left: -9999em;
                }
                .popupTable tr {
                    border: 0.125em solid #333;
                    border-bottom: 0;
                }
                /* Leave a space between table rows */
                .popupTable tr + tr {
                    margin-top: 1.5em;
                }
                /* Get table cells to act like rows */
                .popupTable tr,
                .popupTable td {
                    display: block;
                }
                .popupTable td {
                    border: none;
                    border-bottom: 0.125em solid #333;
                    /* Leave a space for data labels */
                    padding-left: 50%;
                }
                /* Add data labels */
                .popupTable td:before {
                    content: attr(data-label);
                    display: inline-block;
                    font-weight: bold;
                    line-height: 1.5;
                    margin-left: -100%;
                    width: 100%;
                }
            }
            /* Stack labels vertically on smaller screens */
            
            @media (max-width: 20em) {
                td {
                    padding-left: 0.75em;
                }
                td:before {
                    display: block;
                    margin-bottom: 0.75em;
                    margin-left: 0;
                }
            }
        </style>
</head>

<!-- Format for the sidebar-->
<body>
    <div class="span9" />
    <div class="span2">
        <?php echo $this->element('sidebar'); ?>
<input class="well sidebar-nav" style="left:30px; bottom:100px" type="button" value="Update Chemicals and Facilities" onclick="return confirm('Are you sure you want to update the chemicals and facilities?')">
    </div>
    <div class="span10">
        <div style="text-align:center;margin-left:20%;">
            <br>
            <h1 style="font-size: 40px;">Chemicals</h1>
            <h3>You can search any chemical name to find the chemical. The chemical will list if it's carcinogenic, whether the clean air act bans it, whether its a metal, and whether it's a PBT which are chemicals that are toxic and pose a risk to humans. Clicking the chemical will bring up all its information and facilities that might contain it. </h3>
            <br>
        </div>

        <div class="span10" style="margin-left:20%;">
            <div class="input-group">
                <div class="input-group-addon">Search</div>
                <input type="text" class="form-control" id="mainSearchBar" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
                <a title="Options" id="select_cog" href="#"><img style="position:relative; z-index:100; margin: 8px 0 0 -65px;" src="<?php echo $this->webroot; ?>img/icon_cog.png"></a>
            </div>

            <div id="options" style="display:none; color:white; margin-bottom:20px;">
                <label class="filterLabel">Filters:</label>
                <br>
                <label class="filterLabel">Chemical Name</label>
                <input class="filter" type="input">
                <br>
                <label class="filterLabel">Carcinogenic</label>
                <input class="filter" type="input">
                <br>
                <label class="filterLabel">Clean Air Act</label>
                <input class="filter" type="input">
                <br>
                <label class="filterLabel">Metal</label>
                <input class="filter" type="input">
                <br>
                <label class="filterLabel">PBT</label>
                <input class="filter" type="input">
                <br>
            </div>

            <table class="table table-striped" style="border-top: 0px;">
                <thead>
                    <tr>
                        <th class="span3" style="width:auto"><a href="#" rel="tooltip" id="chemical_name" class="orderButton" style="color: #F5F3DC" title="Chemicals commonly associated with hazardous waste.">Chemical Name</a></th>
                        <th class="span3" style="width:auto;"><a href="#" rel="tooltip" id="carcinogenic" class="orderButton" style="color: #F5F3DC" title="Any type of substance, pollutant, or contaminant having the potential to cause cancer.">Carcinogenic</a></th>
                        <th class="span3" style="width:auto;"><a href="#" rel="tooltip" id="clean_air_act" class="orderButton" style="color: #F5F3DC" title="The Clean Air Act (CAA) is the federal law that regulates air emissions from stationary and mobile sources.">Clean Air Act</a></th>
                        <th class="span3" style="width:auto;"><a href="#" rel="tooltip" id="metal" class="orderButton" style="color: #F5F3DC" title="A solid material that is typically hard, shiny, malleable, fusible, and ductile, with good electrical and thermal conductivity. Some metals are aluminum, copper, silver, lead, etc.">Metal</a></th>
                        <th class="span3" style="width:auto;"><a href="#" rel="tooltip" id="pbt" class="orderButton" style="color: #F5F3DC" title="PBT pollutants are chemicals that are toxic and pose risks to human health and ecosystems.">PBT</a></th>
                    </tr>
                </thead>
                <input id="currentOffset" type="hidden">
                <input id="currentCount" type="hidden">
                <input id="currentOrder" type="hidden">
                <input id="currentLimit" type="hidden" value=25>
                <!-- Important!! This contains the 'cell' elements that contain the: chemical name and properties of this chemical. This is dynamically created. (NOT HARD CODED!!!) -->
                <tbody id="dataTable">
                </tbody>
            </table>

            <!--Number pagination, skip to a different page or alter how many items on each page-->
            <div class="row-fluid">
                <div class="span2" style="margin-top:12px; text-align:center;">
                    Page <span id="currentPage">1</span> of <span id="pageCount"></span>
                    <br><span id="totalResults"></span>
                </div>
                <div id="pageList" class="span7 pagination pagination-centered">
                </div>
                <div class="span3" style="margin-top:12px; text-align:center;">
                    Items per Page:
                    <a href="#" class="limit" style="text-decoration:underline">25</a>
                    <a href="#" class="limit">50</a>
                    <a href="#" class="limit">75</a>
                    <a href="#" class="limit">100</a>
                </div>
                <script>
                    bindEvents("chemicals", "chemical_name");
                </script>
            </div>
            <!-- row-fluid -->
        </div>
        <?php $this->Js->writeBuffer(); ?>
    </div>
    
    <!-- initializes the popup class-->
    <div class="popup">
        <div style="float:left; height: 50%;">
            <button class="btn btn-primary" style="float:right;" name="closePopup">Close</button>
            <button class="btn btn-primary" style="float:right; margin: 0 5px;" onclick="switchDisplay(1)">Location</button>
            <button class="btn btn-primary" style="float:right;" onclick="switchDisplay(0)">Statistics</button>
            <h2 id="popName">Unknown Name</h2>
            <hr>
            <br>
            <div id="chem-info">
                <h3 id="popCar">Carcinogenic: N/A</h3>
                <h3 id="popAir">Clean Air Act: N/A</h3>
                <h3 id="popMet">Metal: N/A</h3>
                <h3 id="popP">PBT: N/A</h3>
            </div>
            <div id="fac-list" style="display:none; height: 75%;">
                <table class="popupTable">
                    <thead>
                        <tr>
                            <th>Facilities that contain this chemical</th>
                        </tr>
                    </thead>
                    <tbody style="display: block; height: 100%; overflow-y: auto" id="popTable">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<!-- Including necessary javascript for bootstrap tooltip - Joie Murphy -->
<script src='<?=$this->webroot?>js/bootstrap-alert.js' async></script>
<script src='<?=$this->webroot?>js/bootstrap-modal.js' async></script>
<script src='<?=$this->webroot?>js/bootstrap-transition.js' async></script>
<script src='<?=$this->webroot?>js/bootstrap-tooltip.js' async></script>

<!-- implements the open and close functions of the popup-->
<script>
    function popupOpenClose(e) {
        0 == $(".wrapper").length && $(e).wrapInner("<div class='wrapper'></div>"), $(e).show(), $(e).click(function (n) {
                n.target == this && $(e).is(":visible") && $(e).hide()
            }),
            $(e).find("button[name=closePopup]").on("click", function () {
                $(".formElementError").is(":visible") && $(".formElementError").remove(), $(e).hide()
            })
    }

    /* populates all the data in the popup */
    function populatePopup() {
        if (!location.hash) {
            return
        }

        popupOpenClose($(".popup"))
        switchDisplay(0)


        $.ajax({
            url: "/cabect/SOAP/index.php/chemicals/view/" + location.hash.split("#")[1],
            type: 'POST',
            success: function (data) {

                // Clears hash
                history.pushState('', document.title, window.location.pathname);

                // This data variable has ALL THE DATA TO POPULATE THE POPUP.
                data = JSON.parse(data)

                //Recommendation: console.log(data) if you want to take a look at the data

                /* sets all the fields in the popup equal to the respective data */
                document.getElementById('popName').innerHTML = data.NAME;
                document.getElementById('popCar').innerHTML = "Carcinogenic: " + data.CAR;
                document.getElementById('popAir').innerHTML = "Clean Air Act: " + data.CLEANAIR;
                document.getElementById('popMet').innerHTML = "Metal: " + data.METAL;
                document.getElementById('popP').innerHTML = "PBT: " + data.PBT;

                //popupTable
                var temp = ''
                for (var count = 0, size = data.FACILITY.length; count < size; count++) {
                    temp += '<tr><td>'
                    temp += '<a class="pageLink" href="/cabect/SOAP/index.php/facilities#' + data.FACILITY[count].id + '">' + data.FACILITY[count].name + '</a>'
                    temp += '</tr></td>'
                }

                document.getElementById('popTable').innerHTML = temp;
            }
        });
    }

    /* displays the popup when a hash is added to the end of the URL */
    $(window).on('hashchange', populatePopup);

    /* switches display between the chemicals info part of the popup and
    the list of facilities with the chemicals contained in it */
    function switchDisplay(eID) {
        var id = ['chem-info', 'fac-list']
        if (document.getElementById(id[eID]).style.display == 'none') {
            document.getElementById(id[eID]).style.display = 'block'
            document.getElementById(id[Math.abs(eID - 1)]).style.display = 'none'
        }
    }

    window.onload = function () {
        if (location.hash != '') {
            populatePopup()
        }
    };
</script>
