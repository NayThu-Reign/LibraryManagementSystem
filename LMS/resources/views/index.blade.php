@extends('layouts.app')

@section('content')
    <div class="row bg-black mb-5" style="width: 100%; height: 500px;">
        <div class="col-6 d-flex align-items-center">
            <h1 class="ms-5 text-light">
                Expand your knowledge and gain wisdom by reading books!
            </h1>
        </div>
        <img src="{{ asset('R (6).jpg')}}" alt="Library Cover photo" class="col-6" style="width: 50%; height: 100%;">
    </div>

    <div class="container">
        <h2 class="mb-5" style="margin-left: 120px; font-weight: bold;">Featured Collections</h2>
        <div class="d-lg-flex justify-content-center" style="gap: 80px; margin-bottom: 80px">
            <div class="card" style="width: 300px; height: 400px">
                <img src="{{ asset('OIP (22).jpg') }}" class="card-img-top" alt="img-top-cover" style="height: 230px">
                <div class="card-body d-flex flex-column text-center">
                  <h4 class="card-title" style="font-weight: bold">Let's dive into fiction world</h4>
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, aperiam!</p>
                  <a href="{{ url("/categories/2")}}" class="btn btn-primary" style="font-weight: bold; font-size: 15px">See All Books</a>
                </div>
            </div>

            <div class="card" style="width: 300px; height: 400px">
                <img src="{{ asset('R (9).jpg') }}" class="card-img-top" alt="img-top-cover" style="height: 230px">
                <div class="card-body d-flex flex-column text-center">
                  <h4 class="card-title" style="font-weight: bold">Discover People</h4>
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, aperiam!</p>
                  <a href="{{ url("/categories/4")}}" class="btn btn-primary" style="font-weight: bold; font-size: 15px">See All Books</a>
                </div>
            </div>

            <div class="card" style="width: 300px; height: 400px">
                <img src="{{ asset('OIP (23).jpg') }}" class="card-img-top" alt="img-top-cover" style="height: 230px">
                <div class="card-body d-flex flex-column text-center">
                  <h4 class="card-title" style="font-weight: bold">Let's learn Science</h4>
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, aperiam!</p>
                  <a href="{{ url("/categories/3")}}" class="btn btn-primary" style="font-weight: bold; font-size: 15px">See All Books</a>
                </div>
            </div>
        </div>

        <h2 class="mb-4" style="font-weight: bold">Upcoming events</h2>
        <div style="font-size: 16px; line-height: 5px; margin-bottom: 50px">
            <p>Join us for events designed to engage, inspire and connect.</p>
            <p>From author talks to book clubs, there's always something exciting happening.</p>
        </div>

        <div class="row" style="margin-bottom: 50px">
            <div class="col-4">
                <div style="width: 100%; height: 280px; margin-bottom: 50px">
                    <img src="{{ asset('th (2).jpg')}}" alt="event photo" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="col-8">
                <h5 class="mt-3">Author talk</h5>
                <h3 style="font-weight: bold; margin-bottom: 20px">Exploring the craft of writing</h3>
                <div style="font-size: 16px; margin-bottom: 20px">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta recusandae corrupti velit hic voluptatem pariatur, ex debitis minima dolor quidem, aspernatur iusto praesentium corporis sint vero! Illo odit distinctio corrupti fugiat architecto beatae quisquam tempora iure molestiae. Velit odio neque eveniet fugit vel assumenda vitae cumque dolorum enim necessitatibus dolor, dolores molestias praesentium porro, recusandae repellendus obcaecati perspiciatis. Et explicabo dicta nobis, neque fuga obcaecati perspiciatis laboriosam earum quisquam porro.</p>
                </div>
                <div class="d-flex gap-5" style="font-size: 16px; font-weight: bold">
                    <div>02/16/2024</div>
                    <div>5pm - 8pm</div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 50px">
            <div class="col-4">
                <div style="width: 100%; height: 280px; margin-bottom: 50px">
                    <img src="{{ asset('join-bookclub-1d.jpg')}}" alt="event photo" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="col-8">
                <h5 class="mt-3">Book Club Discussion</h5>
                <h3 style="font-weight: bold; margin-bottom: 20px">"The Great Gatsby" by F.Scott Fitzgerald</h3>
                <div style="font-size: 16px; margin-bottom: 20px">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta recusandae corrupti velit hic voluptatem pariatur, ex debitis minima dolor quidem, aspernatur iusto praesentium corporis sint vero! Illo odit distinctio corrupti fugiat architecto beatae quisquam tempora iure molestiae. Velit odio neque eveniet fugit vel assumenda vitae cumque dolorum enim necessitatibus dolor, dolores molestias praesentium porro, recusandae repellendus obcaecati perspiciatis. Et explicabo dicta nobis, neque fuga obcaecati perspiciatis laboriosam earum quisquam porro.</p>
                </div>
                <div class="d-flex gap-5" style="font-size: 16px; font-weight: bold">
                    <div>02/16/2024</div>
                    <div>5pm - 8pm</div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 80px">
            <div class="col-4">
                <div style="width: 100%; height: 280px; margin-bottom: 50px">
                    <img src="{{ asset('OIP (25).jpg')}}" alt="event photo" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="col-8">
                <h5 class="mt-3">Children Story Time</h5>
                <h3 style="font-weight: bold; margin-bottom: 20px">Magical adventures await</h3>
                <div style="font-size: 16px; margin-bottom: 20px">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta recusandae corrupti velit hic voluptatem pariatur, ex debitis minima dolor quidem, aspernatur iusto praesentium corporis sint vero! Illo odit distinctio corrupti fugiat architecto beatae quisquam tempora iure molestiae. Velit odio neque eveniet fugit vel assumenda vitae cumque dolorum enim necessitatibus dolor, dolores molestias praesentium porro, recusandae repellendus obcaecati perspiciatis. Et explicabo dicta nobis, neque fuga obcaecati perspiciatis laboriosam earum quisquam porro.</p>
                </div>
                <div class="d-flex gap-5" style="font-size: 16px; font-weight: bold">
                    <div>02/16/2024</div>
                    <div>5pm - 8pm</div>
                </div>
            </div>
        </div>

    </div>
    <div class="bg-black" style="height: 500px; margin-bottom: 80px">
        <div class="container text-white">
            <h2 class="mb-3" style="padding-top: 40px">Library Services</h2>
            <div style="font-size: 16px; line-height: 6px;">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat quas odit a officia culpa architecto saepe iusto corporis consequuntur consequatur.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sit. Voluptatibus aut repellat autem pariatur. Quod dolores odio veritatis nesciunt.</p>
            </div>

            <div style="line-height: 8px; margin-top: 60px">
                <h3>Book with ease</h3>
                <p>Expore our vest collection of physical and digital resources available for borrowing.</p>
            </div>

            <div style="line-height: 8px; margin-top: 60px">
                <h3>Personalized recommendations</h3>
                <p>Let our expert librarians guide you to your next favorite read with personalized recommendations.</p>
            </div>

            <div style="line-height: 8px; margin-top: 60px; margin-bottom: 20px">
                <h3>Access anywhere, anytime</h3>
                <p>Enjoy 24 / 7 access to our digital collection of e-books, audiobooks, and online databases.</p>
            </div>

        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="mb-3"  style="width: 100%; height: 250px">
                    <img src="{{ asset('OIP (24).jpg')}}" alt="about-img" style="width: 100%; height: 100%;">
                </div>
                <div class="mb-3"  style="width: 100%; height: 250px">
                    <img src="{{ asset('book-books-on-bookshelf-library-library-image.jpg')}}" alt="about-img" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="col-8">
                <div>
                    <h2 class="mb-3" style="font-weight: bold">About Us</h2>
                    <p style="font-size: 18px">
                       Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore doloribus a similique esse possimus obcaecati laudantium eaque? Similique sapiente ipsa ullam, sequi, exercitationem eveniet non vitae molestias numquam, debitis autem? Temporibus assumenda perspiciatis laboriosam reiciendis esse molestias aperiam iste, voluptatibus atque animi eum distinctio quidem soluta ipsa consequuntur aspernatur non labore quae recusandae possimus vero?
                    </p>

                    <p style="font-size: 18px">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, nostrum quibusdam minima, consectetur libero beatae natus ab iste delectus sequi molestias atque minus repellat, soluta debitis saepe corrupti vitae non eius quas sapiente qui totam necessitatibus pariatur? Voluptates adipisci obcaecati vero ex? Perferendis necessitatibus reprehenderit quod, aliquid vitae unde laudantium optio quaerat ipsam tempora deserunt nihil consequatur aliquam ad sed.
                    </p>

                    <p style="font-size: 18px">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate sequi eius architecto hic cumque eaque, iure itaque consequatur quidem beatae rem voluptatem maiores quo accusantium. Distinctio ad sint eligendi similique consequuntur nihil fugit exercitationem sequi perferendis doloribus omnis, labore perspiciatis voluptatem! Nulla voluptatibus non odio velit officia repudiandae molestiae ab vitae iste, nesciunt praesentium corporis, animi necessitatibus nemo eaque repellat!
                    </p>
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-black" style="height: 150px">
        <div class="container d-flex" style="gap: 400px">
            <div class="text-white">
                <h4 class="mt-3">LMS</h4>
                <div><i class="fa-light fa-phone"></i>091234567</div>
                <div>LMS@gmail.com</div>
                <div>Yangon, Myanmar</div>
            </div>

            <div>
                <h4 class="text-white mt-5">Opening hours</h4>
                <div class="d-flex text-white" style="gap: 30px">
                    <div>Mon - Thu</div>
                    <div>7am - 10pm</div>
                </div>
                <div class="d-flex text-white gap-5">
                    <div>Fri - Sat</div>
                    <div>7am - 6pm</div>
                </div>
            </div>

            <div class="text-white">
                <h4 class="mt-3">Legal</h4>
                <a href="#" class="text-decoration-none text-white">Privacy policy</a> <br>
                <a href="#" class="text-decoration-none text-white">Terms and Conditions</a>
            </div>

        </div>
    </footer>
@endsection
