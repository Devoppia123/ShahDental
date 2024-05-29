

<div id="team-main" class="main-section">
    <div class="container">
        <div class="team-txt-blk all-txt-blk">
            <div class="branch-heading">
                <h2>Meet the Team</h2>
                <p>Dr. Shah Faisal & Associates takes pride in introducing its dynamic team of qualified experienced &
                    professionally<br>
                    competent Dental Surgeon supported by well-trained chair side assistants, lab technicians &
                    receptionist.</p>
            </div>
            <div class="team-card-block">
                @foreach ($doctors as $index => $doc)
                    <div class="team-card-box @if($index == 1 || $index == 2) ahmed @endif">
                        <img src="{{ url("public/profile_image/$doc->profile_image") }}" alt="">
                        @foreach ($doc->user_role as $user_role)
                            <h3>{{ $user_role->name }}</h3>
                        @endforeach
                        <a href="{{ url("get_appointment/$doc->doctorID") }}" target="_blank">MAKE AN APPOINTMENT</a>
                       <p>
                        <a href="{{ url("doctor_profile/$doc->doctorID") }}" class="custom-link" target="_blank">View Profile</a>
                        <a href="{{ url("ask_doctor/$doc->doctorID") }}" class="custom-link" target="_blank" >Ask Doctor</a>
                       </p>

                   
                    </div>
                @endforeach
            </div>
            <div class="view-more">
                <a class="plain-text team-view" href="{{ url('/find-doctors') }}" target="_blank">VIEW MORE >></a>

            </div>
        </div>
    </div>
</div>
