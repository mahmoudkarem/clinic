@extends('admin.layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Prescription Details Invoice</h5>
                </div>
                <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-end">
                                    <div class="col-lg-8">
                                        <div class="page-header-title">
                                            <i class="ik ik-file-text bg-blue"></i>
                                            <div class="d-inline">
                                                <h5>Invoice</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header"><h3 class="d-block w-100">Patient Name : {{ $prescription->patient->name }} | Email :  {{ $prescription->patient->email }} <small class="float-right">Date: {{ $prescription->date }}</small></h3></div>
                                <div id="printMe" class="card-body">
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">

                                            <address>
                                                <strong>Doctor: {{ $prescription->doctor->name }}</strong><br>Department : {{ $prescription->doctor->department }}
                                            </address>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Disease</th>
                                                        <th>Symptoms</th>
                                                        <th>Medicine </th>
                                                        <th>Procedure to use medicine</th>
                                                        <th>Feedback</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $prescription->disease }}</td>
                                                        <td>{{ $prescription->symptoms }}</td>
                                                        <td>{{ $prescription->medicine }}</td>
                                                        <td>{{ $prescription->procedure }}</td>
                                                        <td>{{ $prescription->feedback }}</td>
                                               </tbody>
                                            </table>
                                            <div class="col-12">
                                                Signature  : {{ $prescription->signature }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row no-print mt-3">
                                        <div class="col-12">

                                                <a href="{{route('create.pdf.file',$prescription->id)}}">
                                            <button type="submit" type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
<script>
     function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
</script>
@endsection
