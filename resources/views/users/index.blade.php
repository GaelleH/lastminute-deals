@extends('layouts.app', ['page' => __('Klanten'), 'pageSlug' => 'clients'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4>Klanten</h4>
                    </div>
                    <div class="col-4 text-right">
                            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">{{ 'Voeg klant toe' }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="row">
                        <div class="form-group col-md-6">
                            <h5>Start Date <span class="text-danger"></span></h5>
                            <div class="controls">
                                <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>End Date <span class="text-danger"></span></h5>
                            <div class="controls">
                                <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="text-left" style="margin-left: 15px;">
                            <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
                        </div>
                    </div>
                    <table class="table table-bordered" id="laravel_datatable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
 $(document).ready( function () {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ url('clients-list') }}",
          type: 'GET',
          data: function (d) {
          d.start_date = $('#start_date').val();
          d.end_date = $('#end_date').val();
          }
         },
         columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'created_at', name: 'created_at' }
               ]
      });
   });
 
  $('#btnFiterSubmitSearch').click(function(){
     $('#laravel_datatable').DataTable().draw(true);
  });
</script>
@endsection