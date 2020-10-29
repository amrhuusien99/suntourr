
            <div class="form-group">
                <label for="hotel">Hotel</label>
                {!! Form::text('hotel',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                {!! Form::text('country',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="average_price">Average Price</label>
                {!! Form::text('average_price',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="background">Background</label><br>
                {!! Form::file('background',null,['class'=>'form-control']) !!}
            </div>   
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>