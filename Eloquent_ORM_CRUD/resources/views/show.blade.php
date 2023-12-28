<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Student Laravel Eloquent ORM CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>

<body>
    <div class="container">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-12 margin-tb">
                    <div style="text-align: center;">
                        <h4>Show Student Details</h4>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        
            <div class="row" style="margin-top: 20px;text-align: center;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong><br>
                        {{ $student->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
                    <div class="form-group">
                        <strong>Email:</strong><br>
                        {{ $student->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
                    <div class="form-group">
                        <strong>Phone:</strong><br>
                        {{ $student->phone }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
                    <div class="form-group">
                        <strong>Address:</strong><br>
                        {{ $student->address }}
                    </div>
                </div>
            </div>
    </div>
 
</body>