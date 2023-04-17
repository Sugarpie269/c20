<!DOCTYPE html>
<html>
<head>
  <title>Form List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
  <style>
    .approve {
        background-color: green;
        border-color: green;
        color: #ffffff;
    }
    .delete {
        background-color: #ff0000;
        border-color: 1px solid #ff0000;
        color: #ffffff;
    }
    .nominee-details-modal{
        margin-top:10%;
    }
    .nominee-details-modal tr td{
        font-size:16px;
        color:#000;
        line-height:1.25;
    }
    .modal-btn{
        min-width: 100px;
    }
  </style>
</head>
<body>

<div class="container" style="padding: 3%;margin: 0;max-width: 100%;">
  <div class="row">
    <div class="col-12">
      <h1>Form List</h1>
    </div>
  </div>
  
        <section class="content" id="section_list">
            <div class="row ">
                <div class="col-md-12">
                    <div class="portlet box primary">
                        
                        <div class="portlet-body">
                            <div class="form-group row">
                                <label class="col-md-3 control-label" for="from_date">From Date:</label>
                                <label class="col-md-3 control-label" for="to_date">To Date:</label>
                            </div>
                            <div class="form-group row" id="report">
                                <div class="col-md-3">
                                    <input id="from_date" type="date" name="from_date" value="{{$date['from_date'] }}" type="text" class="form-control" >
                                 </div >
                                <div class="col-md-3">  
                                    <input id="to_date" type="date" name="to_date" value="{{$date['to_date'] }}" type="text" class="form-control" >
                                </div>
                                <div class="col-md-6">  
                                    <a class='delete btn' style="background-color: #F58D31;color:#fff;" onclick="onFilterChange()" >Search</a>
                                    <a class='delete btn' style="background-color: #40843D;color:#fff;" href="{!! url('reports') !!}">Clear</a>
                                    <a class='delete btn' style="background-color: #41A3D4;color:#fff;" onclick="exportFile()">Export</a>
                                 </div > 
                             </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped"  id="report_form">
                                        <thead>
                                        <tr>
                                            <th style="display: none">Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>State, Country</th>
                                            <th>Unique Light No</th>
                                            <th>Keep Public</th>
                                            
                                            <th>Likes</th>  
                                            <th>Date</th>
                                            <th>Nominee Details</th>
                                            <th>Approval Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>                                            
                                                    <td style="display: none">{!! $item->id !!}</td>
                                                    <td>{!! $item->name !!}</td>
                                                    <td>{!! $item->email !!}</td>
                                                    <td>{{$item->state_name->name. ', '.$item->country_name->name}}</td>
                                                    <td>{!! $item->unique_light_number !!}</td>
                                                     <td>{!! $item->keep_public_status !!}</td>       
                                                     {{-- <td>{!! like_count('{{$item->id}}','{{csrf_token()}}') !!}</td>    --}}
                                                     <td>{{Helper::format_number_in_k_notation($item->likes->count())}}</td>   
                                                     <td>{!! $item->Date !!}</td>  
                                                     <td>
                                                        <button class = "btn modal-btn" style="background-color: #41A3D4;color:#fff;" data-toggle = "modal" data-target = "#myModal{!! $item->id !!}">
                                                        {!! $item->naminee_name !!}
                                                        </button>
                                                            <!-- Modal -->
                                                            <div class = "modal fade nominee-details-modal"  id = "myModal{!! $item->id !!}"  tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
                                                            
                                                            <div class = "modal-dialog">
                                                                <div class = "modal-content">
                                                                    
                                                                    <div class = "modal-header">
                                                                        
                                                                        <h4 class = "modal-title" id = "myModalLabel">
                                                                        Nominee Details
                                                                        </h4>
                                                                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                                                                            &times;
                                                                        </button>
                                                                    </div>
                                                                    <div class = "modal-body">            
                                                                        <table  class = "table table-bordered">
                                                                            <tr>
                                                                                <td style="width:40%;">Nominee Name</td>
                                                                                <td style="width:60%;">{!! $item->naminee_name !!}</td>
                                                                            </tr>
                                                                            
                                                                            <tr>
                                                                                <td>Nominee Email</td>
                                                                                <td>{!! $item->naminee_email !!}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Story</td>
                                                                                <td>{!! $item->story !!}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Nominee State, Country</td>
                                                                                <td> 
                                                                                    {{-- {{ (isset($item->nomiee_state_name->name) && $item->nomiee_state_name->name != "") ? ($item->nomiee_state_name->name.', ' : ''.isset($item->nomiee_country_name->name)) && ($item->nomiee_country_name->name != "") ? $item->nomiee_country_name->name.', ' : '' }} --}}
                                                                                    {{-- {{$item->nomiee_state_name->name:. ' '.$item->nomiee_country_name->name}} --}}                                                                                        
                                                                                    {{ (isset($item->nomiee_state_name->name))?$item->nomiee_state_name->name.",":'' }} {{(isset($item->nomiee_country_name->name)?$item->nomiee_country_name->name:'')}}
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            </div>
                                                        
                                                     </td>                                    
                                                    <td>
                                                        @if ($item->is_approved=="N") 
                                                            <a href='{{env('APP_URL')}}/reports/updateStatus/{!!  $item->id !!}/Y'
                                                                class='delete btn' id="Decline" data-link='' title="click to approve">
                                                            {{-- <i class="fa fa-check" aria-hidden="true"> </i>                                                         --}}
                                                            Declined
                                                            </a>
                                                        @else 
                                                            <a href='{{env('APP_URL')}}/reports/updateStatus/{!!  $item->id !!}/N'
                                                                class='approve btn' data-link='' id="Approve" title="click to decline">
                                                            {{-- <i class="fa fa-times" aria-hidden="true"> </i>                                                         --}}
                                                                Approved
                                                        </a>
                                                        
                                                        @endif   
                                                    </td>                                          
                                                </tr>

                                            
        



                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




    <script src="{{ asset('front/js/like_count.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('front/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"><script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('#from_date').datepicker({
            //         format: 'dd-mm-yyyy'
            //     });
            // $('#to_date').datepicker({
            //         format: 'dd-mm-yyyy'
            // });
            $("#report_form").validate({
                rules: {
                    from_date: {
                        required: true
                    },  
                    to_date: {
                        required: true
                    }
                }
            });
            const dataTable = $('#report_form').DataTable({
                pageLength: 50,
                order: [[0, 'desc']],
            });
    
            $('#filter-button').click(function() {
            const fromDate = new Date($('#from-date').val());
            const toDate = new Date($('#to-date').val());
        
            
            });
        }); 

            

        function onFilterChange() {
            if($("#from_date").val() && $("#to_date").val())
                window.location.href = window.location.origin+ '/reports/'+ $("#from_date").val() +'/'+ $("#to_date").val()      
        }

        function exportFile(params) {
            const filteredDate = {!! json_encode($date) !!};
            let url = '{{env('APP_URL')}}/reports/getlist/';
            if(filteredDate.from_date && filteredDate.to_date)
                url+= filteredDate.from_date + "/" + filteredDate.to_date; 
            $.ajax({
                url: url,
                type: 'get',
                contentType: false,
                processData: false,
                success: function(response){
                    let filename = "form_"+new Date().getTime()+".xlsx";
                    let sheet1 = XLSX.utils.json_to_sheet(response);
                    let excelBook = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(excelBook, sheet1, "Sheet 1");
                    XLSX.writeFile(excelBook, filename);
                    alert("Data exported successfully!")
                }
            })
        }

    </script>
    </body>
    </html>
    