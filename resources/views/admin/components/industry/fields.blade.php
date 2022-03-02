<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ form::label('name','Name')}}
            {{form::text('name',$industry->name,['class'=>'form-control','placeholder'=>'Name'])}}

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.templatingSelect2').select2({
            theme: "bootstrap4",
        });
    });
</script>




