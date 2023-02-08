
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Prescription Details Invoice</title>

</head>
<body>
    <style>
        /* ROOT FONT STYLES */

  body { font-family: DejaVu Sans, sans-serif; }


* {
    padding: 0;
    margin: 0 auto;
    box-sizing: border-box;
}



/* ==== GRID SYSTEM ==== */
.container {
  width: 90%;
  margin-left: auto;
  margin-right: auto;
}

.row {
  position: relative;
  width: 100%;
}

.row [class^="col"] {
  float: left;
 }

.row::after {
    content: "";
    clear: both;
    display: block;
}

.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

/* Custom */

  .container{
    min-height:84px;
    border:1px solid black;
    max-width:420px;
    margin: 0 auto;
    margin-top:40px;
  }
  header{
    min-height:83px;
    border-bottom:1px solid black;

  }

.doc-details{
    margin-top:5px;
  margin-left:15px;

}

.clinic-details{
  margin-top:5px;
  margin-left:15px;
}
  .doc-name{
    font-weight:bold;
    margin-bottom:5px;

  }
  .doc-meta{
    font-size:9px;
  }
.datetime{
  font-size:10px;
  margin-top:5px;

}

.row.title{
 font-weight:bold;
  padding-left:10px;
  margin-top:10px;
  margin-bottom:10px;
}

.prescription{
  min-height:380px;
  margin-bottom:10px;
}
table{
  text-align:left;
  width:90%;
  min-height:25px;
}
table th{
  font-size:8px;
  font-weight:bold;
}

table tr{
  margin-top:20px;
}
table td{
  font-size:7px;

}

.instruction{
  font-size:6px;
}
    </style>
    <div class="container">
        <header class="row">
          <div class="col-10">
            <div class="doc-details">
              <p class="doc-name">
                {{$npateint_name}}
                </p>

              <p class="doc-meta"> Doctor : {{$ndoctor_name}}</p>
            </div>

            <div class="clinic-details">
              <p class="doc-meta">Clinic system</p>
              <p class="doc-meta">Egypt Cairo</p>
            </div>

          </div>
          <div class="col-2 datetime">
            <p>Date: {{$prescriptions->date}}</p>
          </div>
        </header>
        <div class="prescription">
          <p style="margin-left:15px;font-size:10px;font-weight:bold;">Rx  Name of patient, M/35</p>
            <table>
                {{--
    "id" => 1
    "doctor_id" => 6
    "patient_id" => 5
    "disease" => "مرض قلب"
    "symptoms" => "كحة"
    "date" => "2023-02-03"
    "medicine" => "كيتوفان"
    "procedure" => "مرة يوميا"
    "feedback" => "لا يوجد"
    "signature" => "احمد كارم"
    "created_at" => "2023-02-03 16:15:09"
    "updated_at" => "2023-02-03 16:15:09" --}}
         <tr>
          <th></th>
           <th>disease</th>
          <th>symptoms</th>
          <th>medicine</th>
          <th>procedure</th>
          <th>feedback</th>
         </tr>
         <tr>
          <td>1</td>
          <td>{{$prescriptions->disease}}</td>
          <td>{{$prescriptions->symptoms}}</td>
          <td>{{$prescriptions->medicine}}</td>
          <td>{{$prescriptions->procedure}}</td>
          <td>{{$prescriptions->feedback}}</td>

         </tr>


        </table>


        </div>

        <p style="font-size:9px;text-align:right;padding-bottom:15px;padding-right:25px;">Dr. {{$prescriptions->signature}}</p>
        <p style="font-size:6px;text-align:center;padding-bottom:20px;">This is a digitally generated Prescription</p>
      </div>
</body>
</html>
