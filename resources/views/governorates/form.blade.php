                        

                    @inject('countries','App\Models\Country')

                    <div class="form-group">
                        <label for="name">Name</label>
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div> 

                    <div class="form-group" >
                        <label for="country_id">Country</label>
                            {!! Form::select('country_id',$countries->pluck('name','id')->toArray(),null, [
                            'class'=>'form-control'
                            ])!!}
                    </div> 

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>