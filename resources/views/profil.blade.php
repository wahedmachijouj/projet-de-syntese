<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>profil</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="icon" href="{{ asset('ressources/icon.svg') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>



    <style>

    </style>
</head>

<body>


    @include('partiels.nav')

    <div>


        @isset($user)
            @if($user->type == 'normal')


                            <div id="normal">
                                <div>
                                    <img  src="{{ asset('ressources/profilPic.svg') }}" alt="image_profil">
                                </div>
                                <form action="/modiferP/{{$user->id}}" method="POST">
                                    <h4 class="text">Profil</h4>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nouveau nom</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required  value='{{$user->name}}'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Nouveau Adresse e-mail</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value='{{$user->email}}' required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Nouveau mot de passe</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc"  class="form-label">Nouvelle description</label>
                                        <textarea id="desc" name="desc" rows="4" cols="50" class="form-control" required>{{$user->desc}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-grid">
                                            <button class="BTN w-25">Modifier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
 
            @else
            <div class="d-flex justify-content-around">

                                <form  class = 'border-color m-4 p-3 mt-5' action="/modiferP/{{$user->id}}" method="POST" style="height: 700px;">
                                    <h4 class="text">Profil</h4>
                                    @csrf
                                    <div class=" mt-4 mb-3">
                                        <label for="name" class="form-label">Nouveau nom</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required  value='{{$user->name}}'>
                                    </div>
                                    <div class="mb-3" id="selectbox">
                                        <label  class="form-label" for="category">Nouvelle catégorie</label>
                                        <select class="form-select" name="category" id="category">
                                            <option selected  value="{{$user->category}}">{{$user->category}}</option>
                                            <option value="medcin">medcin</option>
                                            <option value="coiffeur">coiffeur</option>
                                            <option value="dentist">dentist</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Nouveau Adresse e-mail</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value='{{$user->email}}' required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">nouveau mot de passe</label>
                                        <input type="password" name="password" class="form-control" id="password" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc"  class="form-label">Nouvelle description</label>
                                        <textarea id="desc" name="desc" rows="4" cols="50" class="form-control" required>{{$user->desc}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresse"  class="form-label">Nouvelle adresse</label>
                                        <input type="text" id="adresse" name="adresse"  class="form-control" value= '{{$user->adresse}}' required/>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-grid">
                                            <button class="BTN w-25" >Modifier</button>
                                        </div>
                                    </div>
                                </form>





                                
                                <form class = 'border-color m-4 p-3 mt-5' action="/data/{{$user->id}}" method="POST" style="height: 660px;">
                                    <h4 class="text">Calendrier</h4>
                                    @csrf 
                                    <div class="mt-4 mb-3">
                                        <label for="jour">Des jours indisponibles</label>
                                        <input type="date" class="form-control" id="jour" name="jour">
                                        <span class="btn btn-outline-secondary btn-sm mt-1" id="btn1">Ajouter</span>
                                        <textarea id="area_jour" name="area_jour" class="form-control mt-2" rows="1" cols="60"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="heur">Des jours et heures indisponibles</label>
                                        <input type="datetime-local" class="form-control" id="heur" name="heur">
                                        <span class="btn btn-outline-secondary btn-sm mt-1" id="btn2">Ajouter</span>
                                        <textarea id="area_heur" name="area_heur" class="form-control mt-2" rows="1" cols="60"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="startHour">Start Hour</label>
                                        <input type="number" class="form-control" id="startHour" name="startHour" min="0" max="23" value="{{$user->Calendrier->startHour}}">
                                    </div>

                                    <div class="mb-3">
                                         <label for="endHour">End Hour</label>
                                        <input type="number" class="form-control" id="endHour" name="endHour" min="1" max="24" value="{{$user->Calendrier->endHour}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="interval">Interval</label>
                                        <input type="number" class="form-control" id="interval" name="interval" min="1" max="60" value="{{$user->Calendrier->interval}}">
                                    </div>

                                    
                                    <div class="mb-3">
                                        <div class="d-grid">
                                            <button type="submit" class="BTN w-25">Modifier</button>
                                        </div>
                                    </div>
                                </form>

            </div> 

            <script>
                    document.getElementById("btn1").onclick = jourr;
                    let jour = document.getElementById("jour");
                    let jourarea = document.getElementById("area_jour");

                    function jourr() {
                        if (jourarea.textContent.trim() === '') {
                            if (jour.value.trim() !== '') {
                                jourarea.innerHTML += jour.value.trim();
                            }
                        } else {
                            let dates = jourarea.textContent.split(',').map(date => date.trim());

                            if (!dates.includes(jour.value.trim())) {
                                jourarea.innerHTML += ',' + jour.value.trim();
                            } 
                        }
                        console.log(jourarea.textContent);
                    }


                    document.getElementById("btn2").onclick = heurr;
                    let heur = document.getElementById("heur");
                    let heurarea = document.getElementById("area_heur");

                    function heurr() {
                        if (heurarea.textContent.trim() === '') {
                            if (heur.value.trim() !== '') {
                                heurarea.innerHTML += heur.value.trim();
                            }
                        } else {
                            let dates = heurarea.textContent.split(',').map(date => date.trim());

                            if (!dates.includes(heur.value.trim())) {
                                heurarea.innerHTML += ',' + heur.value.trim();
                            } 
                        }
                        console.log(heurarea.textContent);
                    }

            </script>

            @endif
        @endisset



        @isset($other)
        <h3><i>{{$other->category}}</i></h3>
        <div id="other">

            <div id="div0">
                <ul>
                    <li>{{$other->name}}</li>
                    <li>{{$other->email}}</li>
                    <li>{{$other->desc}}</li>
                    <li>{{$other->adresse}}</li>
                </ul>

                <div>
                    <img src="{{asset('ressources/PicProfil.svg')}}" alt="Profil_image"/>
                </div>
            </div>



            <div id='div1'>
                @isset($aviss)
                    
                    <div>
                        @foreach($aviss as $avis)
                        <ul>
                            <li>
                                <span><img src="{{asset('ressources/etoileJaune.svg')}}" alt="etoil_icon"/></span>
                                <span><img src="{{asset('ressources/etoileJaune.svg')}}" alt="etoil_icon"/></span>
                                <span><img src="{{asset('ressources/etoileJaune.svg')}}" alt="etoil_icon"/></span>
                                <span><img src="{{asset('ressources/etoileJaune.svg')}}" alt="etoil_icon"/></span>
                                <span><img src="{{asset('ressources/etoileblanch.svg')}}" alt="etoil_icon"/></span>
                            </li>
                            <li class='avis'>{{$avis->avis}}</li>
                            @if($avis->user_n ==  auth()->user()->id )
                                <a href="/supAvi/{{$avis->id}}"><li>supprimer</li></a>
                            @endif
                        </ul>
                        @endforeach
                    </div>

                @endisset
                <a href="/addavis/{{$other->id}}">ajouter avis</a>
            </div>


            <div id="div2">
                <div class="wrapper">
                    <header>
                        <p class="current-date"></p>
                        <div class="icons">
                            <span id="prev" class="material-symbols-rounded"><img src ="{{ asset('ressources/left.svg') }}" type="image/x-icon"></span>
                            <span id="next" class="material-symbols-rounded"><img src ="{{ asset('ressources/right.svg') }}" type="image/x-icon"></span>
                        </div>
                    </header>
                    <div class="calendar">
                        <ul class="weeks">
                            <li>Dim</li>
                            <li>Lun</li>
                            <li>Mar</li>
                            <li>Mer</li>
                            <li>Jeu</li>
                            <li>Ven</li>
                            <li>Sam</li>
                        </ul>
                        <ul class="days"></ul>
                    </div>
                </div>


                <table class="schedule"> 
                    <tbody id="schedule-body"> 
                    </tbody>
                </table> 
            </div>

             <form action="{{$action1}}" method="Post">
                @csrf
                @empty($rdv)

                    @if($errors->any())
                        <ul class="alert alert-danger list-unstyled" role="alert">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div style = 'display : none;'>
                        <label for='user_n'>user_n</label>
                        <input type='number' id='user_n' name='user_n' value='{{ auth()->id() }}' readonly/>
                    </div>
                    <div style = 'display : none;'>
                        <label for='user_p'>user_p</label>
                        <input type='number' id='user_p' name='user_p'value='{{$other->id}}' readonly/>
                    </div>
                    <div>
                        <label for='tele'>tele</label>
                        <input type='number' id='tele' name='tele'/>
                    </div>
                    <div>
                        <label for='email'>email</label>
                        <input type='email' id='email' name='email'/>
                    </div>
                    <div>
                        <label for='info'>information</label>
                        <input type='text' id='info' name='info'/>
                    </div>
                    <div>
                        <label for='date'>date</label>
                        <input type='datetime-local' id='date' name='date' readonly/>
                    </div>
                    
                    <!-- <button type='submit'>prenez</button> -->



                    @if(Auth::user()->type === 'normal')
                        <button type='submit'>Prenez</button>
                    @endif
                @endempty

                @isset($rdv)

                    @if($errors->any())
                        <ul class="alert alert-danger list-unstyled" role="alert">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div  style = 'display : none;'>
                        <label for='user_n'>user_n</label>
                        <input type='number' id='user_n' name='user_n' value='{{$rdv->user_n}}' readonly/>
                    </div>
                    <div style = 'display : none;'>
                        <label for='user_p'>user_p</label>
                        <input type='number' id='user_p' name='user_p' value='{{$rdv->user_p}}' readonly/>
                    </div>
                    <div>
                        <label for='tele'>tele</label>
                        <input type='number' id='tele' name='tele' value='{{$rdv->tele}}'/>
                    </div>
                    <div>
                        <label for='email'>email</label>
                        <input type='email' id='email' name='email' value='{{$rdv->email}}'/>
                    </div>
                    <div>
                        <label for='info'>information</label>
                        <input type='text' id='info' name='info' value='{{$rdv->info}}'/>
                    </div>
                    <div>
                        <label for='date'>date</label>
                        <input type='datetime-local' id='date' name='date' value='{{$rdv->date}}' readonly/>
                    </div>

                    <button type='submit'>Modifier</button>
                @endisset
            </form>

            <script>
                const AvisElements = document.querySelectorAll('.avis');


                AvisElements.forEach(function(element) {
                    if(element.innerText.length > 100){
                        var fullAvis = element.innerText;
                        var truncatedAvis = fullAvis.substring(0, 104);
                        element.innerText = truncatedAvis + '...';
                    }
                });
            </script>
        </div>

           


            

   
            <script>

                let d = {!! json_encode($other->calendrier->dates_indis) !!};
                let h = {!! json_encode($other->calendrier->startHour) !!};
                let m = {!! json_encode($other->calendrier->endHour) !!};
                let i = {!! json_encode($other->calendrier->interval) !!};

            

                document.addEventListener('DOMContentLoaded', () => {
                    // const unavailableDates = ['2024-04-30 08:30:00', '2024-04-30 08:00:00', '2024-04-30 09:00:00', '2024-06-01 08:00:00', '2024-06-15 14:00:00'];
                    const unavailableDates = d; // Ensure `d` is defined or handle its null case.
                    //const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    const months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
                    let selectedDay = '';
                    let selectedHour = '';

                    const daysTag = document.querySelector(".days");
                    const currentDate = document.querySelector(".current-date");
                    const prevNextIcon = document.querySelectorAll(".icons span");
                    const scheduleBody = document.getElementById('schedule-body');

                    let date = new Date();
                    let currYear = date.getFullYear();
                    let currMonth = date.getMonth() + 1;

                    const renderCalendar = () => {
                        let firstDayofMonth = new Date(currYear, currMonth - 1, 1).getDay();
                        let lastDateofMonth = new Date(currYear, currMonth, 0).getDate();
                        let lastDayofMonth = new Date(currYear, currMonth - 1, lastDateofMonth).getDay();
                        let lastDateofLastMonth = new Date(currYear, currMonth - 1, 0).getDate();

                        let liTag = "";
                        for (let i = firstDayofMonth; i > 0; i--) { 
                            liTag += `<li class="inactive" style="visibility: hidden;">${lastDateofLastMonth - i + 1}</li>`;
                        }
                        for (let i = 1; i <= lastDateofMonth; i++) {
                            let isToday = i === date.getDate() && currMonth === new Date().getMonth() + 1 && currYear === new Date().getFullYear() ? "active" : "";
                            let imposi = (i < date.getDate() &&  currYear === new Date().getFullYear() && currMonth === new Date().getMonth() + 1) || (currMonth < new Date().getMonth() + 1 &&  currYear === new Date().getFullYear() ) || currYear < new Date().getFullYear() ? 'imposi' : "";
                            liTag += `<li class="${isToday} ${imposi}">${i}</li>`;
                        }
                        for (let i = lastDayofMonth; i < 6; i++) {
                            liTag += `<li class="inactive d-none">${i - lastDayofMonth + 1}</li>`;
                        }

                        currentDate.innerText = `${months[currMonth - 1]} ${currYear}`;
                        daysTag.innerHTML = liTag;

                        markUnavailableDays();

                        const dayItems = daysTag.querySelectorAll('li');
                        dayItems.forEach((dayItem, index) => {
                            dayItem.addEventListener('click', () => {
                                let day;
                                if (dayItem.classList.contains('inactive')) {
                                    if (index < firstDayofMonth) {
                                        const prevMonthDate = new Date(currYear, currMonth - 2, dayItem.textContent);
                                        day = prevMonthDate.getDate();
                                    } else {
                                        const nextMonthDate = new Date(currYear, currMonth, dayItem.textContent);
                                        day = nextMonthDate.getDate();
                                    }
                                } else {
                                    day = dayItem.textContent;
                                }
                                selectedDay = day;
                                if (selectedHour) {
                                    consoleDateTime();
                                }
                                renderSchedule();
                            });
                        });
                    };

                    const formatTime = (hours, minutes) => {
                        let h = hours;
                        let m = minutes < 10 ? '0' + minutes : minutes;
                        return `${h < 10 ? '0' : ''}${h}:${m}`;
                    };

                    const createTimeSlots = (startHour, endHour, interval) => {
                        let slots = [];
                        for (let hour = startHour; hour < endHour; hour++) {
                            for (let minute = 0; minute < 60; minute += interval) {
                                let nextHour = hour;
                                let nextMinute = minute + interval;
                                if (nextMinute >= 60) {
                                    nextMinute -= 60;
                                    nextHour += 1;
                                }
                                if (nextHour >= endHour) break;
                                    slots.push(`${formatTime(hour, minute)} - ${formatTime(nextHour, nextMinute)}`);
                                }
                            }
                            return slots;
                    };

                    const timeSlots = createTimeSlots(h, m, i);

                    const renderSchedule = () => {  
                            scheduleBody.innerHTML = '';
                            const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${selectedDay < 10 ? '0' + selectedDay : selectedDay}`;

                            let allUnavailable = true;

                            timeSlots.forEach(slot => {
                                const tr = document.createElement('tr');
                                const td = document.createElement('td');
                                td.textContent = slot;
                                const fullDateTime = `${selectedDate} ${slot.split(" - ")[0]}:00`;
                                if (unavailableDates && unavailableDates.includes(fullDateTime)) {
                                    td.classList.add('unavailable');
                                    // tr.classList.add('unavailable');
                                } else {
                                    allUnavailable = false;
                                }
                                tr.appendChild(td);
                                scheduleBody.appendChild(tr);
                            });

                            const dayItems = daysTag.querySelectorAll('li');
                                dayItems.forEach(dayItem => {
                                const day = parseInt(dayItem.textContent, 10);
                                    if (day == selectedDay) {
                                        if (allUnavailable) {
                                            dayItem.classList.add('unavailable-day');
                                        } else {
                                            dayItem.classList.remove('unavailable-day');
                                        }
                                    }
                                });
                            };

                            const markUnavailableDays = () => {
                                const dayItems = daysTag.querySelectorAll('li');
                                dayItems.forEach(dayItem => {
                                    const day = parseInt(dayItem.textContent, 10);
                                    if (!isNaN(day)) {
                                        const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${day < 10 ? '0' + day : day}`;
                                        let allUnavailable = true;

                                        timeSlots.forEach(slot => {
                                            const fullDateTime = `${selectedDate} ${slot.split(" - ")[0]}:00`;
                                            if (!unavailableDates || !unavailableDates.includes(fullDateTime)) {
                                                allUnavailable = false;
                                            }
                                        });

                                        if (allUnavailable) {
                                            dayItem.classList.add('unavailable-day');
                                        }
                                    }
                                });
                            };

                            renderCalendar();

                            prevNextIcon.forEach(icon => {
                                icon.addEventListener("click", () => {
                                    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
                                    if (currMonth < 1) {
                                        currYear--;
                                        currMonth = 12;
                                    } else if (currMonth > 12) {
                                        currYear++;
                                        currMonth = 1;
                                    }
                                    renderCalendar();
                                });
                            });

                            scheduleBody.addEventListener('click', (event) => {
                                if (event.target && event.target.nodeName === "TD") {
                                    const timeSlot = event.target.textContent.split(" - ")[0];
                                    selectedHour = timeSlot;
                                    if (selectedDay) {
                                        consoleDateTime();
                                    }
                                }
                            });

                            const consoleDateTime = () => {
                                if (selectedDay && selectedHour) {
                                    const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${selectedDay < 10 ? '0' + selectedDay : selectedDay} ${selectedHour}:00`;
                                    if (unavailableDates && unavailableDates.includes(selectedDate)) {
                                        console.log("Selected date and time is unavailable.");
                                    } else {
                                        // console.log(selectedDate);
                                        document.getElementById('date').value = selectedDate;
                                    }
                                    selectedDay = '';
                                    selectedHour = '';
                                }
                            };
    
    
                    });


            </script>
        @endisset

    </div>
    @include('partiels.footer')

</body>
</html>



















<!-- <script>
        let selectedDay = '';
        let selectedHour = '';

        document.addEventListener('DOMContentLoaded', () => {
            
            const daysTag = document.querySelector(".days");
            const currentDate = document.querySelector(".current-date");
            const prevNextIcon = document.querySelectorAll(".icons span");
            const scheduleBody = document.getElementById('schedule-body');

            let date = new Date();
            let currYear = date.getFullYear();
            let currMonth = date.getMonth() + 1;


            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            const unavailableDates = ['2024-05-19 08:30:00', '2024-05-19 08:00:00', '2024-05-19 09:00:00', '2024-06-01 08:00:00', '2024-06-15 14:00:00'];

            const renderCalendar = () => {
                let firstDayofMonth = new Date(currYear, currMonth - 1, 1).getDay(),
                    lastDateofMonth = new Date(currYear, currMonth, 0).getDate(),
                    lastDayofMonth = new Date(currYear, currMonth - 1, lastDateofMonth).getDay(),
                    lastDateofLastMonth = new Date(currYear, currMonth - 1, 0).getDate();

                let liTag = "";
                for (let i = firstDayofMonth; i > 0; i--) {
                    liTag += `<li class="inactive" style="visibility: hidden;">${lastDateofLastMonth - i + 1}</li>`;
                }
                for (let i = 1; i <= lastDateofMonth; i++) {
                    let isToday = i === date.getDate() && currMonth === new Date().getMonth() + 1 && currYear === new Date().getFullYear() ? "active" : "";
                    liTag += `<li class="${isToday}">${i}</li>`;
                }
                for (let i = lastDayofMonth; i < 6; i++) {
                    liTag += `<li class="inactive d-none">${i - lastDayofMonth + 1}</li>`;
                }

                currentDate.innerText = `${months[currMonth - 1]} ${currYear}`;
                daysTag.innerHTML = liTag;

                markUnavailableDays();

                const dayItems = daysTag.querySelectorAll('li');
                dayItems.forEach((dayItem, index) => {
                    dayItem.addEventListener('click', () => {
                        let day;
                        if (dayItem.classList.contains('inactive')) {
                            if (index < firstDayofMonth) {
                                const prevMonthDate = new Date(currYear, currMonth - 2, dayItem.textContent);
                                day = prevMonthDate.getDate();
                            } else {
                                const nextMonthDate = new Date(currYear, currMonth, dayItem.textContent);
                                day = nextMonthDate.getDate();
                            }
                        } else {
                            day = dayItem.textContent;
                        }
                        selectedDay = day;
                        if (selectedHour) {
                            consoleDateTime();
                        }
                        renderSchedule();
                    });
                });
            };

            const formatTime = (hours, minutes) => {
                let h = hours;
                let m = minutes < 10 ? '0' + minutes : minutes;
                return `${h < 10 ? '0' : ''}${h}:${m}`;
            };

            const createTimeSlots = (startHour, endHour, interval) => {
                let slots = [];
                for (let hour = startHour; hour < endHour; hour++) {
                    for (let minute = 0; minute < 60; minute += interval) {
                        let nextHour = hour;
                        let nextMinute = minute + interval;
                        if (nextMinute >= 60) {
                            nextMinute -= 60;
                            nextHour += 1;
                        }
                        if (nextHour >= endHour) break;
                        slots.push(`${formatTime(hour, minute)} - ${formatTime(nextHour, nextMinute)}`);
                    }
                }
                return slots;
            };

            const timeSlots = createTimeSlots(8, 9, 30);

            const renderSchedule = () => {
                scheduleBody.innerHTML = '';
                const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${selectedDay < 10 ? '0' + selectedDay : selectedDay}`;

                let allUnavailable = true;

                timeSlots.forEach(slot => {
                    const tr = document.createElement('tr');
                    const td = document.createElement('td');
                    td.textContent = slot;
                    const fullDateTime = `${selectedDate} ${slot.split(" - ")[0]}:00`;
                    if (unavailableDates.includes(fullDateTime)) {
                        td.classList.add('unavailable');
                    } else {
                        allUnavailable = false;
                    }
                    tr.appendChild(td);
                    scheduleBody.appendChild(tr);
                });

                const dayItems = daysTag.querySelectorAll('li');
                dayItems.forEach(dayItem => {
                    const day = parseInt(dayItem.textContent, 10);
                    if (day == selectedDay) {
                        if (allUnavailable) {
                            dayItem.classList.add('unavailable-day');
                        } else {
                            dayItem.classList.remove('unavailable-day');
                        }
                    }
                });
            };

            const markUnavailableDays = () => {
                const dayItems = daysTag.querySelectorAll('li');
                dayItems.forEach(dayItem => {
                    const day = parseInt(dayItem.textContent, 10);
                    if (!isNaN(day)) {
                        const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${day < 10 ? '0' + day : day}`;
                        let allUnavailable = true;

                        timeSlots.forEach(slot => {
                            const fullDateTime = `${selectedDate} ${slot.split(" - ")[0]}:00`;
                            if (!unavailableDates.includes(fullDateTime)) {
                                allUnavailable = false;
                            }
                        });

                        if (allUnavailable) {
                            dayItem.classList.add('unavailable-day');
                        }
                    }
                });
            };

            renderCalendar();

            prevNextIcon.forEach(icon => {
                icon.addEventListener("click", () => {
                    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
                    if (currMonth < 1) {
                        currYear--;
                        currMonth = 12;
                    } else if (currMonth > 12) {
                        currYear++;
                        currMonth = 1;
                    }
                    renderCalendar();
                });
            });

            scheduleBody.addEventListener('click', (event) => {
                if (event.target && event.target.nodeName === "TD") {
                    const timeSlot = event.target.textContent.split(" - ")[0];
                    selectedHour = timeSlot;
                    if (selectedDay) {
                        consoleDateTime();
                    }
                }
            });

            const consoleDateTime = () => {
                if (selectedDay && selectedHour) {
                    const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${selectedDay < 10 ? '0' + selectedDay : selectedDay} ${selectedHour}:00`;
                    if (unavailableDates.includes(selectedDate)) {
                        console.log("Selected date and time is unavailable.");
                    } else {
                        console.log(selectedDate);
                    }
                    selectedDay = '';
                    selectedHour = '';
                }
            };
        });
</script> -->




<!-- <script>

    let nomDis = '';
    const daysTag = document.querySelector(".days"),
    currentDate = document.querySelector(".current-date"),
    prevNextIcon = document.querySelectorAll(".icons span");




  let date = new Date(),
  currYear = date.getFullYear(),
  currMonth = date.getMonth();

  const months = ["January", "February", "March", "April", "May", "June", "July","August", "September", "October", "November", "December"];
  
  const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), 
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), 
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); 


    let liTag = "";
    for (let i = firstDayofMonth; i > 0; i--) { 
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }
    for (let i = 1; i <= lastDateofMonth; i++) { 
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }
    for (let i = lastDayofMonth; i < 6; i++) {
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }


    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = liTag;


       const dayItems = daysTag.querySelectorAll('li');
       dayItems.forEach((dayItem, index) => {
        dayItem.addEventListener('click', () => {
            let day;
            if (dayItem.classList.contains('inactive')) {
                if (index < firstDayofMonth) {
                    const prevMonthDate = new Date(currYear, currMonth - 1, dayItem.textContent);
                    let date = `${prevMonthDate.getFullYear()}-${prevMonthDate.getMonth() + 1}-${prevMonthDate.getDate()}`;
                    nomDis = date;
                    console.log(nomDis);
                    //console.log(`Date clicked: ${prevMonthDate.getFullYear()}-${prevMonthDate.getMonth() + 1}-${prevMonthDate.getDate()}`);
                } else {
                    const nextMonthDate = new Date(currYear, currMonth + 1, dayItem.textContent);
                    let date = `${nextMonthDate.getFullYear()}-${nextMonthDate.getMonth() + 1}-${nextMonthDate.getDate()}`;
                    nomDis = date;
                    console.log(nomDis);
                    //console.log(`Date clicked: ${nextMonthDate.getFullYear()}-${nextMonthDate.getMonth() + 1}-${nextMonthDate.getDate()}`);
                }
            } else {
                day = dayItem.textContent;
                let date = `${currYear}-${currMonth + 1}-${day}`;
                nomDis = date;
                console.log(nomDis);
                // console.log(`Date clicked: ${currYear}-${currMonth + 1}-${day}`);
            }
        });
    });
  }

  renderCalendar();
  prevNextIcon.forEach(icon => { 
    icon.addEventListener("click", () => {
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
        if(currMonth < 0 || currMonth > 11) { 
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); 
            currMonth = date.getMonth();
        } else {
            date = new Date(); 
        }
        renderCalendar();
    });
  });






  let hourDis = '';

  document.addEventListener('DOMContentLoaded', () => {
    const scheduleBody = document.getElementById('schedule-body');


    const formatTime = (hours, minutes) => {
        let h = hours % 12;
        h = h ? h : 12; 
        let m = minutes < 10 ? '0' + minutes : minutes;
        let ampm = hours >= 12 ? 'PM' : 'AM';
        // return h + ':' + m + ' ' + ampm;
        return h + ':' + m ;
    };

    const createTimeSlots = (startHour, endHour, interval) => {
        let slots = [];
        for (let hour = startHour; hour < endHour; hour++) {
            for (let minute = 0; minute < 60; minute += interval) {
                let nextHour = hour;
                let nextMinute = minute + interval;
                if (nextMinute >= 60) {
                    nextMinute -= 60;
                    nextHour += 1;
                }
                if (nextHour >= endHour) break;
                slots.push(`${formatTime(hour, minute)} - ${formatTime(nextHour, nextMinute)}`);
            }
        }
        return slots;
    };

    const timeSlots = createTimeSlots(8, 17, 30);

    timeSlots.forEach(slot => {
        const tr = document.createElement('tr');
        const td = document.createElement('td');
        td.textContent = slot;
        tr.appendChild(td);
        scheduleBody.appendChild(tr);
    });

    scheduleBody.addEventListener('click', (event) => {
        if (event.target && event.target.nodeName === "TD") {
            const timeSlot = event.target.textContent.split(" - ")[0];
            hourDis = timeSlot;
            console.log(hourDis);
        }
    });
  });

</script> -->
<!-- <script>
  let selectedDay = ''; 
  let selectedHour = ''; 

  document.addEventListener('DOMContentLoaded', () => {
    const daysTag = document.querySelector(".days"),
          currentDate = document.querySelector(".current-date"),
          prevNextIcon = document.querySelectorAll(".icons span"),
          scheduleBody = document.getElementById('schedule-body');


    let date = new Date(),
        currYear = date.getFullYear(),
        currMonth = date.getMonth() + 1;
        // currMonth = date.getMonth() ;

    const months = ["January", "February", "March", "April", "May", "June", "July","August", "September", "October", "November", "December"];
  
    const renderCalendar = () => {
        let firstDayofMonth = new Date(currYear, currMonth - 1, 1).getDay(),
            lastDateofMonth = new Date(currYear, currMonth, 0).getDate(), 
            lastDayofMonth = new Date(currYear, currMonth - 1, lastDateofMonth).getDay(), 
            lastDateofLastMonth = new Date(currYear, currMonth - 1, 0).getDate(); 

        let liTag = "";
        for (let i = firstDayofMonth; i > 0; i--) { 
            liTag += `<li class="inactive" style="visibility: hidden;">${lastDateofLastMonth - i + 1}</li>`;
        }
        for (let i = 1; i <= lastDateofMonth; i++) { 
            let isToday = i === date.getDate() && currMonth === new Date().getMonth() + 1 && currYear === new Date().getFullYear() ? "active" : "";
            liTag += `<li class="${isToday}">${i}</li>`;
        }
        for (let i = lastDayofMonth; i < 6; i++) {
            liTag += `<li class="inactive d-none">${i - lastDayofMonth + 1}</li>`
        }

        currentDate.innerText = `${months[currMonth - 1]} ${currYear}`;
        daysTag.innerHTML = liTag;





        const dayItems = daysTag.querySelectorAll('li');
        dayItems.forEach((dayItem, index) => {
            dayItem.addEventListener('click', () => {
                let day;
                if (dayItem.classList.contains('inactive')) {
                    if (index < firstDayofMonth) {
                        const prevMonthDate = new Date(currYear, currMonth - 2, dayItem.textContent);
                        day = prevMonthDate.getDate();
                    } else {
                        const nextMonthDate = new Date(currYear, currMonth, dayItem.textContent);
                        day = nextMonthDate.getDate();
                    }
                } else {
                    day = dayItem.textContent;
                }
                selectedDay = day;
                if (selectedHour) {
                    consoleDateTime();
                }
            });
        });
    };

    renderCalendar();

    prevNextIcon.forEach(icon => { 
        icon.addEventListener("click", () => {
            currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
            if (currMonth < 1) { 
                currYear--;
                currMonth = 12;
            } else if (currMonth > 12) { 
                currYear++;
                currMonth = 1;
            }
            renderCalendar();
        });
    });


    const formatTime = (hours, minutes) => {
        let h = hours;
        let m = minutes < 10 ? '0' + minutes : minutes;
        return `${h < 10 ? '0' : ''}${h}:${m}`;
    };


    const createTimeSlots = (startHour, endHour, interval) => {
        let slots = [];
        for (let hour = startHour; hour < endHour; hour++) {
            for (let minute = 0; minute < 60; minute += interval) {
                let nextHour = hour;
                let nextMinute = minute + interval;
                if (nextMinute >= 60) {
                    nextMinute -= 60;
                    nextHour += 1;
                }
                if (nextHour >= endHour) break;
                slots.push(`${formatTime(hour, minute)} - ${formatTime(nextHour, nextMinute)}`);
            }
        }
        return slots;
    };

  
    const timeSlots = createTimeSlots(8, 17, 30);

    timeSlots.forEach(slot => {
        const tr = document.createElement('tr');
        const td = document.createElement('td');
        td.textContent = slot;
        tr.appendChild(td);
        scheduleBody.appendChild(tr);
    });

    const unavailableDates = ['2024-05-19 15:30:00', '2024-06-01 08:00:00', '2024-06-15 14:00:00']; 


    scheduleBody.addEventListener('click', (event) => {
        if (event.target && event.target.nodeName === "TD") {
            const timeSlot = event.target.textContent.split(" - ")[0];
            selectedHour = timeSlot;
            if (selectedDay) {
                consoleDateTime();
            }
        }
    });

    // Function to log selected date and hour with validation against unavailable dates
    const consoleDateTime = () => {
        if (selectedDay && selectedHour) {
            const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${selectedDay < 10 ? '0' + selectedDay : selectedDay} ${selectedHour}:00`;
            if (unavailableDates.includes(selectedDate)) {
                console.log("Selected date and time is unavailable.");
            } else {
                console.log(selectedDate);
            }
            // Reset selected day and hour
            selectedDay = '';
            selectedHour = '';
        }
    };
  });
</script>   -->
<!-- <script>


  let selectedDay = '';
        let selectedHour = '';

        document.addEventListener('DOMContentLoaded', () => {
            const daysTag = document.querySelector(".days"),
                  currentDate = document.querySelector(".current-date"),
                  prevNextIcon = document.querySelectorAll(".icons span"),
                  scheduleBody = document.getElementById('schedule-body');

            let date = new Date(),
                currYear = date.getFullYear(),
                currMonth = date.getMonth() + 1;

            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            const unavailableDates = ['2024-05-19 08:30:00', '2024-05-19 08:00:00','2024-05-19 09:00:00','2024-06-01 08:00:00', '2024-06-15 14:00:00'];

            const renderCalendar = () => {
                let firstDayofMonth = new Date(currYear, currMonth - 1, 1).getDay(),
                    lastDateofMonth = new Date(currYear, currMonth, 0).getDate(),
                    lastDayofMonth = new Date(currYear, currMonth - 1, lastDateofMonth).getDay(),
                    lastDateofLastMonth = new Date(currYear, currMonth - 1, 0).getDate();

                let liTag = "";
                for (let i = firstDayofMonth; i > 0; i--) {
                    liTag += `<li class="inactive" style="visibility: hidden;">${lastDateofLastMonth - i + 1}</li>`;
                }
                for (let i = 1; i <= lastDateofMonth; i++) {
                    let isToday = i === date.getDate() && currMonth === new Date().getMonth() + 1 && currYear === new Date().getFullYear() ? "active" : "";
                    liTag += `<li class="${isToday}">${i}</li>`;
                }
                for (let i = lastDayofMonth; i < 6; i++) {
                    liTag += `<li class="inactive d-none">${i - lastDayofMonth + 1}</li>`;
                }

                currentDate.innerText = `${months[currMonth - 1]} ${currYear}`;
                daysTag.innerHTML = liTag;

                const dayItems = daysTag.querySelectorAll('li');
                dayItems.forEach((dayItem, index) => {
                    dayItem.addEventListener('click', () => {
                        let day;
                        if (dayItem.classList.contains('inactive')) {
                            if (index < firstDayofMonth) {
                                const prevMonthDate = new Date(currYear, currMonth - 2, dayItem.textContent);
                                day = prevMonthDate.getDate();
                            } else {
                                const nextMonthDate = new Date(currYear, currMonth, dayItem.textContent);
                                day = nextMonthDate.getDate();
                            }
                        } else {
                            day = dayItem.textContent;
                        }
                        selectedDay = day;
                        if (selectedHour) {
                            consoleDateTime();
                        }
                        renderSchedule();
                    });
                });
            };

            const formatTime = (hours, minutes) => {
                let h = hours;
                let m = minutes < 10 ? '0' + minutes : minutes;
                return `${h < 10 ? '0' : ''}${h}:${m}`;
            };

            const createTimeSlots = (startHour, endHour, interval) => {
                let slots = [];
                for (let hour = startHour; hour < endHour; hour++) {
                    for (let minute = 0; minute < 60; minute += interval) {
                        let nextHour = hour;
                        let nextMinute = minute + interval;
                        if (nextMinute >= 60) {
                            nextMinute -= 60;
                            nextHour += 1;
                        }
                        if (nextHour >= endHour) break;
                        slots.push(`${formatTime(hour, minute)} - ${formatTime(nextHour, nextMinute)}`);
                    }
                }
                return slots;
            };

            const timeSlots = createTimeSlots(8, 10, 30);

            const renderSchedule = () => {
                scheduleBody.innerHTML = '';
                const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${selectedDay < 10 ? '0' + selectedDay : selectedDay}`;

                let allUnavailable = true;

                timeSlots.forEach(slot => {
                    const tr = document.createElement('tr');
                    const td = document.createElement('td');
                    td.textContent = slot;
                    const fullDateTime = `${selectedDate} ${slot.split(" - ")[0]}:00`;
                    if (unavailableDates.includes(fullDateTime)) {
                        td.classList.add('unavailable');
                    } else {
                        allUnavailable = false;
                    }
                    tr.appendChild(td);
                    scheduleBody.appendChild(tr);
                });

                const dayItems = daysTag.querySelectorAll('li');
                dayItems.forEach(dayItem => {
                    const day = parseInt(dayItem.textContent, 10);
                    if (day == selectedDay) {
                        if (allUnavailable) {
                            dayItem.classList.add('unavailable-day');
                        } else {
                            dayItem.classList.remove('unavailable-day');
                        }
                    }
                });
            };

            renderCalendar();

            prevNextIcon.forEach(icon => {
                icon.addEventListener("click", () => {
                    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
                    if (currMonth < 1) {
                        currYear--;
                        currMonth = 12;
                    } else if (currMonth > 12) {
                        currYear++;
                        currMonth = 1;
                    }
                    renderCalendar();
                });
            });

            scheduleBody.addEventListener('click', (event) => {
                if (event.target && event.target.nodeName === "TD") {
                    const timeSlot = event.target.textContent.split(" - ")[0];
                    selectedHour = timeSlot;
                    if (selectedDay) {
                        consoleDateTime();
                    }
                }
            });

            const consoleDateTime = () => {
                if (selectedDay && selectedHour) {
                    const selectedDate = `${currYear}-${currMonth < 10 ? '0' + currMonth : currMonth}-${selectedDay < 10 ? '0' + selectedDay : selectedDay} ${selectedHour}:00`;
                    if (unavailableDates.includes(selectedDate)) {
                        console.log("Selected date and time is unavailable.");
                    } else {
                        console.log(selectedDate);
                    }
                    selectedDay = '';
                    selectedHour = '';
                }
            };
        });
</script> -->


