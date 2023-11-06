
@extends('layouts.app')

@section('content')

    <div>
        <div class="canvas-paper"></div>
        <div class="canvas-paper">
            <div>
                <div class="flex-col flex">
                    <div class="w-full bg-gray-900 text-gray-200 border-b border-gray-800">
                        <div class="mx-auto h-16 items-center justify-between px-4 flex">
                            <div>
                                <img src="https://res.cloudinary.com/speedwares/image/upload/v1659284687/windframe-logo-main_daes7r.png" class="block invert h-8 w-auto">
                            </div>
                            <div class="ml-40 mr-auto lg:block relative hidden max-w-xs">
                                <p class="items-center pl-3 pointer-events-none absolute inset-y-0 left-0 flex">
                <span class="items-center justify-center flex">
                  <span class="items-center justify-center flex">
                    <span class="items-center justify-center h-5 w-5 text-gray-400 flex">
                      <span class="items-center justify-center w-full h-full flex">
                        <svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7
                            0 11-14 0 7 7 0 0114 0z"></path></svg>
                      </span>
                    </span>
                  </span>
                </span>
                                </p>
                                <input type="search" placeholder="Type to search" class="border border border-gray-700
                  focus:border-indigo-600 focus:ring-indigo-600 w-full rounded-lg px-3 py-2 pb-2 pl-10 pt-2
                  text-gray-300 sm:text-sm">
                            </div>
                            <div class="ml-auto items-center justify-end md:space-x-6 flex space-x-3">
                                <div class="relative">
                                    <p class="rounded-full bg-gray-800 pb-1 pl-1 pr-1 pt-1 text-gray-300 transition-all duration-200
                    hover:bg-gray-700 hover:text-gray-900 focus:outline-none">
                  <span class="items-center justify-center flex">
                    <span class="items-center justify-center flex">
                      <span class="items-center justify-center text-gray-300 flex">
                        <span class="items-center justify-center w-full h-full flex">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 456.147
                              456.147" style="enable-background:new 0 0 456.147 456.147;" fill="currentColor" class="w-full h-full"><g><path d="M445.666,4.445c-4.504-4.858-11.756-5.954-17.211-2.19L12.694,290.14c-3.769,2.609-5.878,7.012-5.555,11.586 c0.323,4.574,3.041,8.635,7.139,10.686l95.208,47.607l37.042,86.43c1.78,4.156,5.593,7.082,10.064,7.727 c0.621,0.091,1.242,0.136,1.856,0.136c3.833,0,7.506-1.697,9.989-4.701l38.91-46.994l107.587,52.227 c1.786,0.867,3.725,1.306,5.663,1.306c1.836,0,3.674-0.393,5.384-1.171c3.521-1.604,6.138-4.694,7.146-8.432L448.37,18.128 C449.314,14.629,449.878,8.988,445.666,4.445z M343.154,92.883L116.681,334.604l-71.208-35.603L343.154,92.883z M162.003,416.703 l-27.206-63.48L359.23,113.665L197.278,374.771c-0.836,0.612-1.634,1.305-2.331,2.146L162.003,416.703z M312.148,424.651 l-88.604-43.014L400.427,96.462L312.148,424.651z"></path></g></svg>
                        </span>
                      </span>
                    </span>
                  </span>
                                    </p>
                                </div>
                                <div class="relative">
                                    <p class="rounded-full bg-gray-800 pb-1 pl-1 pr-1 pt-1 text-gray-300 transition-all duration-200
                    hover:bg-gray-700 hover:text-gray-300 focus:outline-none">
                  <span class="items-center justify-center flex">
                    <span class="items-center justify-center flex">
                      <span class="items-center justify-center h-6 w-6 flex">
                        <span class="items-center justify-center w-full h-full flex">
                          <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002
                              0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595
                              1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </span>
                      </span>
                    </span>
                  </span>
                                    </p>
                                    <p class="items-center rounded-full bg-indigo-600 px-1.5 py-0.5 text-xs font-semibold text-white
                    absolute -right-1 -top-px inline-flex">2</p>
                                </div>
                                <div class="items-center justify-center relative flex">
                                    <img src="https://images.unsplash.com/photo-1605951654320-a55377b36744?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8YW1lcmljYW4lMjB3b21hbnxlbnwwfHwwfHw%3D&w=1000&q=80" class="object-cover btn- mr-2 h-9 w-9 rounded-full bg-gray-300">
                                    <p class="text-sm font-semibold">Ellen Jones</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 text-gray-200 flex overflow-x-hidden">
                        <div class="bg-gray-900 text-gray-200 md:w-64 md:flex-col lg:flex hidden border-r border-gray-800">
                            <div class="h-full flex-col pt-5 flex overflow-y-auto">
                                <div class="h-full flex-col flex">
                                    <div class="px-4 space-y-4">
                                        <nav class="space-y-1 bg-cover bg-top">
                                            <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200 group
                        block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                      <span class="items-center justify-center flex">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center mr-4 h-5 w-5 flex flex-shrink-0">
                            <span class="items-center justify-center w-full h-full flex">
                              <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24
                                  24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2
                                  2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001
                                  1m-6 0h6"></path></svg>
                            </span>
                          </span>
                        </span>
                      </span>
                                                <span>Dashboard</span>
                                            </a>
                                            <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200 group
                        block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                      <span class="items-center justify-center flex">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center mr-4 flex">
                            <span class="items-center justify-center w-full h-full flex">
                              <svg class="w-full h-full" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 9L13.9558 13.5662C13.5299 14.2051
                                  12.5728 14.1455 12.2294 13.4587L11.7706 12.5413C11.4272 11.8545 10.4701 11.7949
                                  10.0442 12.4338L7 17" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" class="text-gray-300" stroke-width="2"></rect></svg>
                            </span>
                          </span>
                        </span>
                      </span>
                                                <span>About</span>
                                            </a>
                                            <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200 group
                        block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                      <span class="items-center justify-center flex">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center mr-4 flex">
                            <span class="items-center justify-center w-full h-full flex">
                              <svg class="w-full h-full" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 10L8 16" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 12V16" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 8V16" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" class="text-gray-300" stroke-width="2"></rect></svg>
                            </span>
                          </span>
                        </span>
                      </span>
                                                <span>Hero</span>
                                            </a>
                                            <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200 group
                        block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                      <span class="items-center justify-center flex">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center mr-4 text-gray-300 flex">
                            <span class="items-center justify-center w-full h-full flex">
                              <svg class="w-full h-full" width="20" height="20" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 462.189 462.188" stroke="currentColor"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><g><path d="M428.328,118.851h-8.407l31.039-31.043c9.979-9.978,9.979-26.142,0-36.118c-9.972-9.978-26.142-9.978-36.116,0 l-48.395,48.396c-1.164-0.106-2.288-0.353-3.48-0.353c-14.512,0-27.141,7.669-34.32,19.117H131.175 c-7.181-11.448-19.82-19.117-34.321-19.117c-1.193,0-2.32,0.247-3.48,0.353L44.98,51.69c-9.976-9.978-26.145-9.978-36.115,0 c-9.979,9.976-9.979,26.14,0,36.118l31.037,31.043h-6.041C15.158,118.851,0,134.014,0,152.705v23.705 c0,17.661,13.584,32,30.843,33.552l25.409,168.726c0,21.696,17.591,39.295,39.292,39.295h271.101 c21.702,0,39.289-17.599,39.289-39.295l25.414-168.726c17.259-1.552,30.841-15.891,30.841-33.552v-23.705 C462.194,134.014,447.029,118.851,428.328,118.851z M156.946,378.677H96.315l-8.64-66.32h69.271V378.677z M156.946,286.561H83.749 l-7.863-66.328h81.061V286.561z M261.961,378.677h-61.417v-66.325h61.417V378.677z M261.961,286.561h-61.417v-66.321h61.417 V286.561z M358.921,378.677h-48.446v-66.325h60.227L358.921,378.677z M375.828,286.561h-65.353v-66.321h77.139L375.828,286.561z"></path></g></g></svg>
                            </span>
                          </span>
                        </span>
                      </span>
                                                <span>Orders</span>
                                            </a>
                                        </nav>
                                        <div>
                                            <p class="px-4 text-xs font-semibold tracking-widest text-gray-400 uppercase">Data</p>
                                            <nav class="mt-4 space-y-1 bg-cover bg-top">
                                                <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200
                          group block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center flex">
                            <span class="items-center justify-center mr-4 flex">
                              <span class="items-center justify-center w-full h-full flex">
                                <svg class="w-full h-full" width="24" height="24" viewBox="0 0 24 24" fill="none"><ellipse cx="12" cy="7" rx="7" ry="3" stroke="currentColor" class="text-gray-300" stroke-width="2"></ellipse><path d="M5 13C5 13 5 15.3431 5 17C5 18.6569
                                    8.13401 20 12 20C15.866 20 19 18.6569 19 17C19 16.173 19 13 19 13" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="square"></path><path d="M5 7C5 7 5 10.3431 5 12C5 13.6569 8.13401 15 12
                                    15C15.866 15 19 13.6569 19 12C19 11.173 19 7 19 7" stroke="currentColor" class="text-gray-300" stroke-width="2"></path></svg>
                              </span>
                            </span>
                          </span>
                        </span>
                                                    <span>Folders</span>
                                                </a>
                                                <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200
                          group block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center flex">
                            <span class="items-center justify-center mr-4 flex">
                              <span class="items-center justify-center w-full h-full flex">
                                <svg class="w-full h-full" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.90112 11.8461C7.55156 9.56955 9.63235
                                    8 12 8V8C14.3676 8 16.4484 9.56954 17.0989 11.8461L17.6571 13.7998C17.8843 14.5951
                                    18.2336 15.3504 18.6924 16.0386L18.8012 16.2018C18.9408 16.4111 19.0105 16.5158
                                    19.045 16.5932C19.3105 17.1894 18.943 17.8759 18.2997 17.9857C18.2162 18 18.0904 18
                                    17.8388 18H6.16116C5.90958 18 5.78379 18 5.70027 17.9857C5.05697 17.8759 4.68952
                                    17.1894 4.955 16.5932C4.98947 16.5158 5.05924 16.4111 5.19879 16.2018L5.30758
                                    16.0386C5.76642 15.3504 6.11569 14.5951 6.34293 13.7998L6.90112 11.8461Z" fill="currentColor" class="text-gray-300"></path><path d="M11 9L12 3" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round"></path><path d="M13 9L12 3" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round"></path><path d="M12.5 21H11.5" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round"></path></svg>
                              </span>
                            </span>
                          </span>
                        </span>
                                                    <span>Alerts</span>
                                                </a>
                                                <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200
                          group block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center flex">
                            <span class="items-center justify-center mr-4 h-5 w-5 flex flex-shrink-0">
                              <span class="items-center justify-center w-full h-full flex">
                                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0
                                    24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0
                                    00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                              </span>
                            </span>
                          </span>
                        </span>
                                                    <span>Statistics</span>
                                                    <span class="ml-auto items-center rounded-full bg-indigo-50 px-2 py-0.5 text-xs font-semibold
                            text-indigo-600 inline-flex border border-indigo-300 uppercase">New</span>
                                                </a>
                                            </nav>
                                        </div>
                                        <div>
                                            <p class="px-4 text-xs font-semibold tracking-widest text-gray-400 uppercase">Contact</p>
                                            <nav class="mt-4 space-y-1 bg-cover bg-top">
                                                <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200
                          group block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center flex">
                            <span class="items-center justify-center mr-4 h-5 w-5 flex flex-shrink-0">
                              <span class="items-center justify-center w-full h-full flex">
                                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0
                                    24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2
                                    0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2
                                    0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                              </span>
                            </span>
                          </span>
                        </span>
                                                    <span>Forms</span>
                                                    <span class="ml-auto items-center rounded-full bg-gray-500 px-2 py-0.5 text-xs font-semibold
                            text-white inline-flex border border-transparent uppercase">15</span>
                                                </a>
                                                <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200
                          group block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center flex">
                            <span class="items-center justify-center mr-4 flex">
                              <span class="items-center justify-center w-full h-full flex">
                                <svg class="w-full h-full" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round"></circle><path d="M7.88124 15.7559C8.37391 16.1826 9.02309 16.4909
                                    9.72265 16.6928C10.4301 16.897 11.2142 17 12 17C12.7858 17 13.5699 16.897 14.2774
                                    16.6928C14.9769 16.4909 15.6261 16.1826 16.1188 15.7559" stroke="currentColor" class="text-gray-300" stroke-width="2" stroke-linecap="round"></path><circle cx="9" cy="10" r="1.25" fill="currentColor" stroke="currentColor" class="text-gray-300" stroke-width="0.5" stroke-linecap="round"></circle><circle cx="15" cy="10" r="1.25" fill="currentColor" stroke="currentColor" class="text-gray-300" stroke-width="0.5" stroke-linecap="round"></circle></svg>
                              </span>
                            </span>
                          </span>
                        </span>
                                                    <span>Agents</span>
                                                </a>
                                                <a href="editor#" class="items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200
                          group block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center flex">
                            <span class="items-center justify-center mr-4 h-5 w-5 flex flex-shrink-0">
                              <span class="items-center justify-center w-full h-full flex">
                                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0
                                    24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0
                                    0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                              </span>
                            </span>
                          </span>
                        </span>
                                                    <span>Customers</span>
                                                </a>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="mt-auto pb-4">
                                        <nav class="bg-cover bg-top">
                                            <a href="editor#" class="mx-4 items-center rounded-lg px-4 py-2.5 text-sm font-medium text-gray-200
                        group block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                      <span class="items-center justify-center flex">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center mr-4 h-5 w-5 flex flex-shrink-0">
                            <span class="items-center justify-center w-full h-full flex">
                              <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24
                                  24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0
                                  002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756
                                  2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0
                                  00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0
                                  00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0
                                  00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0
                                  001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016
                                  0z"></path></svg>
                            </span>
                          </span>
                        </span>
                      </span>
                                                <span>Settings</span>
                                            </a>
                                            <a href="editor#" class="mx-4 mt-1 items-center rounded-lg px-4 py-2.5 text-sm font-medium
                        text-gray-200 group block flex cursor-pointer transition-all duration-200 hover:bg-gray-800">
                      <span class="items-center justify-center flex">
                        <span class="items-center justify-center flex">
                          <span class="items-center justify-center mr-4 flex">
                            <span class="items-center justify-center w-full h-full flex">
                              <svg class="w-full h-full" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 18.9282C9.21615 19.6303 10.5957 20 12
                                  20C13.4043 20 14.7838 19.6303 16 18.9282C17.2162 18.2261 18.2261 17.2162 18.9282
                                  16C19.6303 14.7838 20 13.4043 20 12C20 10.5957 19.6303 9.21615 18.9282 8C18.2261
                                  6.78385 17.2162 5.77394 16 5.0718C14.7838 4.36965 13.4043 4 12 4C10.5957 4 9.21615
                                  4.36965 8 5.0718" stroke="currentColor" class="text-gray-300" stroke-width="2"></path><path d="M2 12L1.21913 11.3753L0.719375 12L1.21913 12.6247L2 12ZM11 13C11.5523 13 12 12.5523
                                  12 12C12 11.4477 11.5523 11 11 11V13ZM5.21913 6.3753L1.21913 11.3753L2.78087
                                  12.6247L6.78087 7.6247L5.21913 6.3753ZM1.21913 12.6247L5.21913 17.6247L6.78087
                                  16.3753L2.78087 11.3753L1.21913 12.6247ZM2 13H11V11H2V13Z" fill="currentColor" class="text-gray-300"></path></svg>
                            </span>
                          </span>
                        </span>
                      </span>
                                                <span>Logout</span>
                                            </a>
                                            <div class="mt-4 px-2 py-3 border-t border-gray-700">
                                                <div class="items-center justify-between flex">
                                                    <div class="mr-3 w-fit rounded-full relative">
                                                        <img src="https://images.unsplash.com/photo-1605951654320-a55377b36744?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8YW1lcmljYW4lMjB3b21hbnxlbnwwfHwwfHw%3D&w=1000&q=80" class="object-cover btn- h-10 w-10 rounded-full">
                                                    </div>
                                                    <div class="ml-0 mr-auto">
                                                        <p class="text-base font-bold">Ellen Jones</p>
                                                        <p class="text-sm">emcee@windframe.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto flex-col container flex max-w-7xl">
                            <div class="mx-6 my-4">
                                <p class="text-xl lg:text-2xl font-medium">2-column grid dark dashboard with 3-column section</p>
                                <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                            <div class="mx-auto mb-4 mt-2 w-full px-6 lg:mx-0 lg:max-w-none lg:grid-cols-3 grid max-w-3xl grid-cols-1
                gap-6">
                                <div class="lg:col-span-2 grid gap-6">
                                    <div class="lg:grid-cols-3 grid min-h-[120px] grid-cols-1 gap-5">
                                        <div class="items-center rounded-xl text-white justify-center border flex"></div>
                                        <div class="items-center rounded-xl text-white justify-center border flex"></div>
                                        <div class="items-center rounded-xl text-white justify-center border flex"></div>
                                    </div>
                                    <div class="rounded-lg px-3 py-3 text-white justify-center items-center border min-h-[280px]
                    flex"></div>
                                </div>
                                <div class="rounded-lg px-4 py-4 text-white justify-center items-center border flex"></div>
                                <div class="rounded-lg px-3 py-3 lg:col-span-2 text-white justify-center items-center min-h-[350px] border
                  flex"></div>
                                <div class="rounded-lg px-3 py-1 text-white justify-center items-center min-h-[100px] border flex"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
