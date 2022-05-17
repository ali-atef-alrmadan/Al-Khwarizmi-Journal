<div class="flex flex-col h-full">
                        <img class="h-4/6 min-w-min" src="images/SVG/newLogo.svg" alt="log">
                        <h1 class="focus:outline-none text-xl font-black text-center text-indigo-500">Alkhawarizmi</h1>
                    </div>

## About for Al-Khwarizmi

Al-Khwarizmi is a journal of scientific research in Arabic. Allows users to publish
their research and receive a notification about research by system. Journal has
three different users. The most important part is "editorial board", the second part
is "Reviewer", and the last part is "author" sends this part his own research to the
editorial board to send the research to the reviewer for review.
Al-Khwarizmi online Journal system is an online Journal in Arabic. Journal through
net means posting Author's research over electronic system such as internet and
other computer networks. Works as following:
If the author needs to publish his research he must send his research to the Editorial
board, then the Editorial board can download it, and send the research to reviewer
to review it. The reviewer sends review decision to Editorial board to decide the
final decision and send the decision to owner of the research. if decision is accepted
the Editorial board post it in the Journal with Author's name and type of the
research, otherwise sent the rejection to the research.
The main purpose of the Al-Khwarizmi Journal is to assist researchers in publishing
their research after being evaluated by specialized people and to reach them at any
time and any place and receive suggestions through the magazine and after
approval to publish it to the public.

## How to run this project

The project can be run by following these steps:
1. composer install
2. change the store function in page "RegisteredUserController.php" to:
 
        public function store(Request $request, CreatesNewUsers $creator): RegisterResponse
        {
            $user = $creator->create($request->all());
            $user->attachRole('author');
            event(new Registered($user));

            $this->guard->login($user);

            return app(RegisterResponse::class);
        }
// this page in path" ..vendor\laravel\fortify\src\Http\Controllers\RegisteredUserController.php"


3. npm install
4. cp .env.example .env
5. create database in phpmyadmin same name the databaes in .evn file
6. php artisan key:generate
7. php artisan migrate --seed
8. npm run dev
9. php artisan storage:link
10. php artisan optimize 
11. php artisan serv

## The user name and password 
1. author@gmail.com ==>> 123456789
2. reviewer@gmail.com ==> 123456789 
3. editor@gmail.com ==> 123456789

# Al-Khwarizmi-Journal

# Al-Khwarizmi-Journal
