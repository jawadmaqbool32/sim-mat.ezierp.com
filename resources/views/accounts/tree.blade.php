<ul class="list-unstyled">
    @foreach ($accounts as $account)
        <li>
            <span class="mt-3 d-block"><span
                    class="svg-icon svg-icon-2 btn btn-sm btn-icon btn-color-primary btn-active-light-primary">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                            fill="currentColor"></path>
                        <path opacity="0.3"
                            d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                            fill="currentColor"></path>
                    </svg>
                </span>
                <b>
                    {{ $account->start_code }} - {{ $account->name }} </b>
                <b class="float-end mt-2">({{ $account->calculatebalance() }})</b>
            </span>
            <ul class="list-unstyled ms-10 mt-2 border-top border-secondary border-2">
                @foreach ($account->level2 as $level2)
                    <li>
                        <span class="mt-3 d-block"><span
                                class="svg-icon svg-icon-2 btn btn-sm btn-icon btn-color-primary btn-active-light-primary">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.3"
                                        d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>

                            {{ $level2->code }} - {{ $level2->name }}
                            <b class="float-end mt-2">({{ $level2->calculatebalance() }})</b>
                        </span>
                        <ul class="list-unstyled ms-10 mt-2 border-top border-secondary border-2">
                            @foreach ($level2->level3 as $level3)
                                <li>
                                    <span class="mt-3 d-block">
                                        <span
                                            class="svg-icon svg-icon-2 btn btn-sm btn-icon btn-color-primary btn-active-light-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.3"
                                                    d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        {{ $level3->code }} -{{ $level3->name }}
                                        <b class="float-end mt-2">({{ $level3->calculatebalance() }})</b>
                                    </span>
                                    <ul class="list-unstyled ms-10 mt-2 border-top border-secondary border-2">
                                        @foreach ($level3->level4 as $level4)
                                            <li class="border-secondary border-bottom">
                                                <span class="my-3 d-block">
                                                    <i
                                                        class="svg-icon svg-icon-2 btn btn-sm btn-icon btn-color-primary btn-active-light-primary ">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                                                                fill="currentColor"></path>
                                                            <path opacity="0.3"
                                                                d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </i>
                                                    <a href="http://localhost/ssss/general/report/5/filter"
                                                        style="text-decoration: none"> {{ $level4->code }} -
                                                        {{ $level4->name }} </a>
                                                    <b class="float-end mt-2">({{ $level4->calculatebalance() }})</b>
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
