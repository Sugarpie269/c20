<h1>hi</h1>
<div class="form-group mb-3">
    <select  id="country-dd" class="form-control">
        <option value="">Select Country</option>
        @foreach ($data['countries'] as $data)
        <option value="{{$data->id}}">
            {{$data->name}}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group mb-3">
    <select id="state-dd" class="form-control">
    </select>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "/fetch-states",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            
        });
    </script>