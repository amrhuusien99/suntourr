<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Governorate;
use App\Models\Category;
use App\Models\Header;
use App\Models\Contact;
use App\Models\PaymentMethod;
use App\Models\Hotel;
use App\Models\Client;
use App\Models\Room;
use App\Models\SectionAmenity;
use App\Models\Amenity;
use App\Models\Offer;
use App\Models\Reservation;
use App\Models\Reservation_Room;
use App\Models\Setting;
use Mail;
use App\Mail\NewReservation;
use App\Mail\CancelReservation;
use App\Mail\AcceptedReservation;
use App\Mail\RejectReservation;
use App\Models\Comment;

class MainController extends Controller
{
    public function countries(){
        $countries = Country::all();
        return responseJson(1, 'success', $countries);
    }

    public function governorates(Request $request){
        $governorates = Governorate::where(function($query) use($request){
            if($request->has('country_id')){
                $query->where('country_id',$request->country_id);
            }
        })->get();
        return responseJson(1, 'success', $governorates);
    }

    public function categories(){
        $categories = Category::all();
        return responseJson(1, 'success', $categories);
    }

    public function headers(){
        $headers = Header::latest()->first();
        return responseJson(1, 'success', $headers);
    }

    public function payment_methods(){
        $payment = PaymentMethod::all();
        return responseJson(1, 'success', $payment);
    }

    public function contact(Request $request){

        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'content' => 'required',
            'type_of_message' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $contact = Contact::create($request->all());
        return responseJson(1, 'success', $contact);

    }

    //////////////////////////////////////////////////////////////////////// start hotels cycle
    
    public function hotels(){
        $hotels = Hotel::all();
        return responseJson(1, 'success', $hotels);
    }

    public function hotel_details(Request $request){
        $hotel = Hotel::where('id',$request->hotel_id)->first();
        if(!$hotel){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            return responseJson(1, 'success', $hotel);
        }
    }

    public function hotel_rooms(Request $request){
        $h_rooms = Room::where(function($query)use ($request){
            if($request->has('hotel_id')){
                $query->where('hotel_id',$request->hotel_id);
            }
        })->get();
        return responseJson(1, 'success', $h_rooms);
    }

    public function hotel_edit_information(Request $request){
        $hotel = Hotel::where('id',$request->hotel_id)->first();
        if(!$hotel){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            $hotel->update($request->all());
            return responseJson(1, 'success', $hotel);
        }
    }

    ///////////////////////////////////////////////////////////////////// end hotel cycle

    ////////////////////////////////////////////////////////////////////////// start client cycle

    public function client_details(Request $request){
        $client = Client::where('id',$request->client_id)->first();
        if(!$client){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            return responseJson(1, 'success', $client);
        }
    }

    public function client_edit_information(Request $request){
        $client = Client::where('id',$request->client_id)->first();
        if(!$client){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            $client->update($request->all());
            return responseJson(1, 'success', $client);
        }
    }

    ///////////////////////////////////////////////////////////////////////// end client cycle

    //////////////////////////////////////////////////////////////////////// start rooms cycle

    public function rooms(){
        $rooms = Room::latest()->paginate(20);
        return responseJson(1, 'success', $rooms);
    }

    public function create_room(Request $request){

        $validator = validator()->make($request->all(),[
            'title' => 'required',
            'content' => 'required',
            'max_in_room' => 'required',
            'options' => 'required',
            'today_price' => 'required',
            'front_image' => 'required',
            'images' => 'required',
            'hotel_id' => 'required|exists:hotels,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $room = Room::create($request->all());
        if ($request->hasFile('front_image')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/rooms/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $room->photo = 'uploads/rooms/' . $name;
        }
        if ($request->hasFile('images')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/rooms/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $room->photo = 'uploads/rooms/' . $name;
        }
        $room->save();
        return responseJson(1, 'success', $room);

    }

    public function details_room(Request $request){
        $room = Room::where('id',$request->room_id)->first();
        if(!$room){
            return responseJson(0, 'THe Data IS Not Correct');
        }else{
            return responseJSon(1, 'success', $room);
        }
    }

    public function edit_room(Request $request){
        $room = Room::where('id',$request->room_id)->first();
        if(!$room){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            $room->update($request->all());
            return responseJson(1, 'success', $room);
        }
    }

    public function delete_room(Request $request){
        $room = Room::where('id',$request->room_id)->first();
        if(!$room){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            $room->delete();
            return responseJson(1, 'success', 'The Room Has Been Deleted');
        }
    }

    ////////////////////////////////////////////////////////////////////////////// end room cycle

    ////////////////////////////////////////////////////////////////////////////// start sections amenities cycle

    public function sections_amenities(){
        $sections = SectionAmenity::all();
        return responseJson(1, 'success', $sections);
    }

    public function create_section_amenity(Request $request){

        $validator = validator()->make($request->all(),[
            'name' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $valodator->errors()->first());
        }

        $sections = SectionAmenity::create($request->all());
        return responseJson(1, 'success', $sections);

    }

    public function edit_section_amenity(Request $request){
        $section = SectionAmenity::where('id',$request->section_id)->first();
        if(!$section){
            return responseJson(0, 'The Data Is Correct');
        }else{
            $section->update($request->all());
            return responseJson(1, 'success', $section);
        }
    }

    public function delete_section_amenity(Request $request){
        $section = SectionAmenity::where('id',$request->section_id)->first();
        if(!$section){
            return responseJson(0, 'The Data Is Correct');
        }else{
            $section->delete();
            return responseJson(1, 'success', 'The Section Has Been Deleted');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////// end sections amenities cycle

    //////////////////////////////////////////////////////////////////////////////////start amenities cycle

    public function hotel_amenities(Request $request){
        $amenities = Amenity::where(function($query) use($request){
            if($request->has('hotel_id')){
                $query->where('hotel_id',$request->hotel_id);
            }
        })->get();
        return responseJson(1, 'success', $amenities);
    }

    public function create_amenity(Request $request){

        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'section_id' => 'required',
            'hotel_id' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $validaotr->erorr()->first());
        }

        $amenity = Amenity::create($request->all());
        return responseJson(1, 'success', $amenity);

    }

    public function edit_amenity(Request $request){
        $amenity = Amenity::where('id',$request->amenity_id)->first();
        if(!$amenity){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            $amenity->update($request->all());
            return responseJSon(1, 'success', $amenity);
        }
    }

    public function delete_amenity(Request $request){
        $amenity = Amenity::where('id',$request->amenity_id)->first();
        if(!$amenity){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            $amenity->delete();
            return responseJson(1, 'success', 'The Amenity Has Been Deleted');
        }
    }

    ////////////////////////////////////////////////////////////////////////// end amenity cycle

    ///////////////////////////////////////////////////////////////////////////// start offer cycle

    public function offers(Request $request){
        $offers = Offer::where(function($query) use($request){
            if($request->has('hotel_id')){
                $query->where('hotel_id',$request->hotel_id);
            }
        })->get();
        return responseJson(1, 'succes', $offers);
    }

    public function create_offer(Request $request){

        $validator = validator()->make($request->all(),[
            'front_image' => 'required',
            'images' => 'required',
            'title' => 'required',
            'content' => 'required',
            'from' => 'required',
            'to' => 'required',
            'hotel_id' => 'required|exists:hotels,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $offer = Offer::create($request->all());
        return responseJson(1, 'success', $offer);

    }

    public function edit_offer(Request $request){
        $offer = Offer::where('id',$request->offer_id)->first();
        if(!$offer){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            $offer->update($request->all());
            return responseJson(1, 'success', $offer);
        }
    }

    public function delete_offer(Request $request){
        $offer = Offer::where('id',$request->offer_id)->first();
        if(!$offer){
            return responseJson(0, 'The Data IS Not Correct');
        }else{
            $offer->delete();
            return responseJson(1, 'success', 'The Offer Has Been Deleted');
        }
    }

    ///////////////////////////////////////////////////////////////////// end offer cycle

    ///////////////////////////////////////////////////////////////////// start client resevation cycle

    public function client_make_reservation(Request $request){

        $validator = validator()->make($request->all(),[
            'room_id' => 'required|exists:rooms,id',
            'days_quantity' => 'required',
            'payment_id' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $room = Room::where('id',$request->room_id)->first();
        $hotel = Hotel::where('id',$room->hotel_id)->first();
        if($hotel->is_activate == 0 || $hotel->state == 'close'){
            return responseJson(0, 'This Hotel Not Avilable At The Moment');
        }
        $reservation = $request->user()->reservation()->create([
            'notes' => $request->notes,
            'days_quantity' => $request->days_quantity,
            'room_quantity' => $request->room_quantity,
            'hotel_id' => $hotel->id,
            'payment_id' => $request->payment_id,
            'client_id' => $request->user()->id
        ]);
        Reservation_Room::create([
            'reservation_id' => $reservation->id,
            'room_id' => $room->id,
            'room_quantity' => $request->room_quantity
        ]);
        $total = $room->today_price * $request->room_quantity;
        $net = Setting::first()->commission * $total;
        $commission = $total - $net;
        $update = $reservation->update([
            'commission' => $commission,
            'cost' => $room->today_price,
            'total_cost' => $total,
            'net' => $net
        ]);
        $notification = $hotel->notification()->create([
            'title' => 'new reservation',
            'content' => 'there is a new reservation from ' . $request->user()->name,
            'notifiable_id' => $hotel->id,
            'notifiable_type' => 'hotel'
        ]);
        $payment = PaymentMethod::where('id',$request->payment_id)->first();
        $data = [
            'Client-Name' => $request->user()->name,
            'Room' => $room->title,
            'Days-Quantity' => $request->days_quantity,
            'Room-Quantity' => $request->room_quantity,
            'Payment-Menthod' => $payment->name
        ];
        if($hotel->email){
            Mail::to($hotel->email)
                ->bcc("amrhuusien99@gmail.com")
                ->send(new NewReservation($data));
            return responseJson(1, 'success', $data);
        }

    }

    public function client_my_reservation(Request $request){
        
        $validator = validator()->make($request->all(),[
            'client_id' => 'required|exists:clients,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $reservations = Reservation::where('client_id',$request->client_id)->latest()->paginate(20);
        if(!$reservations){
            return responseJson(0, 'The Data Is Not Correct');
        }else{
            return responseJson(1, 'success', $reservations);
        }
    }

    public function client_reservation_details(Request $request){

        $validator = validator()->make($request->all(),[
            'reservation_id' => 'required|exists:reservations,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $reservation = Reservation::where('id',$request->reservation_id)->first();
        if(!$reservation){
            return responserJson(0, 'The Data Is Not Correct');
        }else{
            return responseJson(1, 'success', $reservation);
        }
    }

    public function client_cancel_reservation(Request $request){

        $validator = validator()->make($request->all(),[
            'reservation_id' => 'required|exists:reservations,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $reservation = Reservation::where('id',$request->reservation_id)->first();
        if(!$reservation){
            return responserJson(0, 'The Data Is Not Correct');
        }else{
            $reservation->update(['state' => 'cancel']);
            $hotel = Hotel::where('id',$reservation->hotel_id)->first();
            $notification = $hotel->notifications()->create([
                'title' => 'cancel reservation',
                'content' => 'The customer canceled the reservation number' .  $reservation->id,
                'notifiable_id' => $request->user()->id,
                'notifiable_type' => 'hotel'
            ]);
            $data = [
                'Content' => 'The customer canceled the reservation number' . $reservation->id,
                'Client-Name' => $request->user()->name
            ];
            if($hotel->email){
                Mail::to($hotel->email)
                    ->bcc("amrhuusien99@gmail.com")
                    ->send(New CancelReservation($data));
                return responseJson(1, 'success', $reservation);
            }
        }

    }

    ////////////////////////////////////////////////////////////////////////// end client reservation cycle

    ///////////////////////////////////////////////////////////////////////// start hotel reservation cycle

    public function hotel_reservations(Request $request){

        $validator = validator()->make($request->all(),[
            'state' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }
        
        $reservations = $request->user()->reservations()->where(function($query) use($request){
            if($request->has('state') && $request->state == 'pending'){
                $query->where('state','pending');
            }else{
                return responseJson(0, 'There Is Something Wrong');
            }
        })->get();
        return responseJson(1, 'success', $reservations);

    }
    
    public function hotel_reting_reservation(Request $request){

        $validator = validator()->make($request->all(),[
            'state' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $reservations = $request->user()->reservations()->where(function($query) use($request){
            if($request->has('state') && $request->state == 'accepted'){
                $query->where('state','accepted');
            }elseif($request->has('state') && $request->state == 'rejected'){
                $query->where('state','rejected');
            }elseif($request->has('state') && $request->state == 'cancel'){
                $query->where('state','cancel');
            }elseif($request->has('state') && $request->state == 'complete'){
                $query->where('state','complete');
            }else{
                return responseJson(0, 'There Is Something Wrong');
            }
        })->get();
        return responseJson(1, 'success', $reservations);

    }

    public function hotel_accepted_reservation(Request $request){

        $validator = validator()->make($request->all(),[
            'reservation_id' => 'required|exists:reservations,id'
        ]);
        if ($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $reservation = Reservation::where('id',$request->reservation_id)->first();
        $reservation->update(['state' => 'accepted']);
        $hotel = Hotel::where('id',$reservation->hotel_id)->first();
        $client = Client::where('id',$reservation->client_id)->first();
        $notification = $hotel->notifications()->create([
            'title' => 'The Reservation Was Accepted',
            'content' => 'We will be happy for you to visit us .. Team ' . $hotel->name,
            'notifiable_id' => $client->name,
            'notifiable_type' => 'client'
        ]);
        $data = [
            'Hotel' => $hotel->name,
            'Message' => 'We Will Be Happy For You To Visit Us .. Team ' . $hotel->name,
            'Number-Reservation' => $reservation->id,
            'Room-Quantity' => $reservation->room_quantity,
            'Total-Cost' => $reservation->total_cost
        ];
        if($client->email){
            Mail::to($client->email)
                ->bcc("amrhuusien99@gmail.com")
                ->send(New AcceptedReservation($data));
            return responseJson(1, 'success', $data);
        }

    }

    public function hotel_rejected_reservation(Request $request){

        $validator = validator()->make($request->all(),[
            'reservation_id' => 'required'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $reservation = Reservation::where('id',$request->reservation_id)->first();
        $reservation->update(['state' => 'rejected']);
        $hotel = Hotel::where('id',$reservation->hotel_id)->first();
        $client = Client::where('id',$reservation->client_id)->first();
        $notification = $hotel->notifications()->create([
            'title' => 'The Reservation Was Rejected',
            'content' => 'Sorry We Cant Accept Your Reservation At The Moment .. Team ' . $hotel->name,
            'notifiable_id' => $client->name,
            'notifiable_type' => 'client'
        ]);
        $data = [
            'Hotel' => $hotel->name,
            'Message' => 'Sorry We Cant Accept Your Reservation At The Moment .. Team ' . $hotel->name
        ];
        if($client->email){
            Mail::to($client->email)
                ->bcc("amrhuusien99@gmail.com")
                ->send(New RejectReservation($data));
            return responseJson(1, 'success', $data);
        }

    }

    public function hotel_complete_reservation(Request $request){

        $validator = validator()->make($request->all(),[
            'reservation_id' => 'required',
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());  
        }

        $reservation = Reservation::where('id',$request->reservation_id)->first();
        // dd($reservation);
        $reservation->update(['state' => 'complete']);
        return responseJson(1, 'success', $reservation);

    }    

    //////////////////////////////////////////////////////////////////////// end hotel reservation cycle

    //////////////////////////////////////////////////////////////////// start client comments cycle

    public function client_add_comment(Request $request){

        $validator = validator()->make($request->all(),[
            'content' => 'required',
            'hotel_id' => 'required|exists:hotels,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $comment = Comment::create([
            'content' => $request->content,
            'hotel_id' => $request->hotel_id,
            'client_id' => $request->user()->id
        ]);
        return responseJson(1, 'success', $comment);

    }

    public function client_my_comments(Request $request){
        $comments = Comment::where('client_id',$request->user()->id)->get();
        if($comments){
            return responseJson(1, 'success', $comments);
        }else{
            return responseJson(0, 'There Is Something Wrong');
        }
    }

    public function client_edit_comment(Request $request){

        $validator = validator()->make($request->all(),[
            'content' => 'required',
            'comment_id' => 'required|exists:comments,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $comment = Comment::where('id',$request->comment_id)->first();
        $comment->update(['content' => $request->content]);
        return responseJson(1, 'success', $comment);

    }

    public function client_delete_comment(Request $request){

        $validator = validator()->make($request->all(),[
            'comment_id' => 'required|exists:comments,id'
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first());
        }

        $comment = Comment::where('id',$request->comment_id)->first();
        $comment->delete();
        return responseJson(1, 'success', 'The Comment Has Been Deleted');

    }

    //////////////////////////////////////////////////////////////////////////// end client comment cycle

    ///////////////////////////////////////////////////////////////////////// start hotel comments cycle

    public function hotel_my_comments(Request $request){
        $comments = Comment::where('hotel_id',$request->user()->id)->get();
        if(!$comments){
            return responseJson(0, 'There Is Something Wrong');
        }else{
            return responseJson(1, 'success', $comments);
        }
    }

    //////////////////////////////////////////////////////////////////////// end hotel comments cycle

}
