<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>bitBirds Solutions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

</head>
<style>
    .button {
        display: inline-block;
        padding-bottom: 5%;
    }
    .center {
        width: 55%;
        height: 100%;
        margin: 0 auto;
    }
</style>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mt-5 mb-5 m-auto">
                <form action="" method="post">
                    <h5 style="padding-top: 1%; padding-left: 1.5%; color: darkcyan;">Select your Location</h5>
                    <div class="container-fluid" style="padding-top: 1%;">
                        <div class="row" style="padding-right: 5%;">
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" id="division_id" style="color: #5e5e5e;">
                                    <option selected>Select From</option>
                                    @foreach ($divisions as $division)
                                       <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" id="district_id" style="color: #5e5e5e;">
                                    <option selected>Select To</option>
                                    @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                 @endforeach
                                </select>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <select class="form-select" id="vehicle_id" aria-label="Default select example"
                                                style="color: #5e5e5e;">
                                                <option selected>Select Car</option>
                                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <select class="form-select" id="counter_id" aria-label="Default select example"
                                                style="color: #5e5e5e;">
                                                <option selected>Select Counter</option>
                                                @foreach ($counters as $counter)
                                    <option value="{{ $counter->id }}">{{ $counter->name }}</option>
                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="#">
                                <button type="button" onclick="location.href='panel/passenger/index.html'"style="background-color: #7ac943; color: white; padding-left: 4%; padding-right: 4%;"
                                    class="btn">Confirm Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        $("#division_id").change(function() {
            get_district_by_division();
        })
        //get district by division id
        function get_district_by_division() {
            var division_id = $("#division_id").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var APP_URL = "{{ route('get_all_district') }}";
            $.ajax({
                type: "GET",
                url: APP_URL,
                dataType: "JSON",
                data: {
                    division_id: division_id,
                },
                success: function(data) {
                    $("#district_id").html('');
                    var op = '<option value="" >Select District</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].district_name + '</option>';
                    }
                    $("#district_id").html(op);
                },
                error: function() {
                    $("#district_id").html('');
                    var op = '<option value="" >Select District</option>';
                    $("#district_id").html(op);
                }
            });
        }

        //VEHICLES
        $("#vehicle_id").change(function() {
            get_vehicle_by_counter();
        })
        //get district by division id
        function get_vehicle_by_counter() {
            var vehicle_id = $("#vehicle_id").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var APP_URL = "{{ route('get_all_counter') }}";
            $.ajax({
                type: "GET",
                url: APP_URL,
                dataType: "JSON",
                data: {
                    vehicle_id: vehicle_id,
                },
                success: function(data) {
                    $("#counter_id").html('');
                    var op = '<option value="" >Select Counter</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                    }
                    $("#counter_id").html(op);
                },
                error: function() {
                    $("#counter_id").html('');
                    var op = '<option value="" >Select Counter</option>';
                    $("#counter_id").html(op);
                }
            });
        }
    </script>
</body>
</html>
