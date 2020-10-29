                        

                    @inject('sections','App\Models\SectionAmenity')
                    @inject('hotels','App\Models\Hotel')

                    <div class="form-group">
                        <label for="name">Name</label>
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div> 

                    <div class="form-group" >
                        <label for="section_id">Section Amenity</label>
                        {!! Form::select('section_id',$sections->pluck('name','id')->toArray(),null, [
                        'class'=>'form-control'
                        ])!!}
                    </div> 

                    <div class="form-group" >
                        <label for="hotel_id">Hotel</label>
                        {!! Form::select('hotel_id',$hotels->pluck('name','id')->toArray(),null, [
                        'class'=>'form-control'
                        ])!!}
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>