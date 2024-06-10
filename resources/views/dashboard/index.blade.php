@extends('layout.main')
@section('container')

    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-photo">
                        <img width="" class="" src="https://fisika.uad.ac.id/wp-content/uploads/blank-profile-picture-973460_1280.png" alt="">
                    </div>
                    <div class="info">
                        <p>Hey, <b>{{ auth()->user()->name }}</b> </p>
                        <small class="text-muted">{{ auth()->user()->nis }}</small>
                    </div>
                </div>
                <div class="about">
                    <h5>Kelas | Jurusan</h5>
                    <p>{{ auth()->user()->romble }}</p>
                    <h5>DOB</h5>

                    <p>1234567890</p>
                    {{-- <h5>Email</h5>
                    <p>unknown@gmail.com</p>
                    <h5>Address</h5> --}}
                    <p>Bogor Jawa Barat</p>
                </div>
            </div>
        </aside>

        <main>
            <h1>Attendance</h1>
            {!! $chart->container() !!}
        </main>

        <div class="right">
            <div class="announcements">
                <h2>Announcements</h2>
                <div class="updates">
                    <div class="message">
                        <p> <b>Academic</b> Summer training internship with Live Projects.</p>
                        <small class="text-muted">2 Minutes Ago</small>
                    </div>
                    <div class="message">
                        <p> <b>Co-curricular</b> Global internship oportunity by Student organization.</p>
                        <small class="text-muted">10 Minutes Ago</small>
                    </div>
                    <div class="message">
                        <p> <b>Examination</b> Instructions for Mid Term Examination.</p>
                        <small class="text-muted">Yesterday</small>
                    </div>
                </div>
            </div>

            <div class="leaves">
                <h2>Teachers on leave</h2>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-2.jpeg" alt=""></div>
                    <div class="info">
                        <h3>The Professor</h3>
                        <small class="text-muted">Full Day</small>
                    </div>
                </div>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-3.jpg" alt=""></div>
                    <div class="info">
                        <h3>Lisa Manobal</h3>
                        <small class="text-muted">Half Day</small>
                    </div>
                </div>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-4.jpg" alt=""></div>
                    <div class="info">
                        <h3>Himanshu Jindal</h3>
                        <small class="text-muted">Full Day</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

@endsection