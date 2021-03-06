<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name: </label>
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>

        <div class="form-group">
            <label for="title">Title: </label>
            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>

        <div class="form-group">
            <label for="phone">Phone: </label>
            {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="color">Color: </label>
            {{ Form::text('color', null, ['class' => 'form-control', 'placeholder' => 'Color']) }}
        </div>

        <div class="form-group">
            <label for="bgcolor">Background Color: </label>
            {{ Form::text('bgcolor', null, ['class' => 'form-control', 'placeholder' => 'Background Color']) }}
        </div>

        <div class="form-group">
            <label for="bgcolor">Custom Max Days Off: <small>If left empty, the default {{ config('app.max_days_off') }} will be used.</small></label>
            {{ Form::text('max_days_off', null, ['class' => 'form-control', 'placeholder' => '21']) }}
        </div>
    </div>
</div>