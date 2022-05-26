<nav id="navigation" class="bg-bluegray h-full w-full">
    <ul class="d-flex flex-column">
        <li class="px-1 position-relative d-block <?= $active=='news'?'active':'' ?>">
            <a href="/admin/news">
                <i class="icon-newspaper"></i>
                <span class="ml-1 d-none d-md-block">News</span>
            </a>
        </li>
        <li class="px-1 position-relative d-block <?= $active=='users'?'active':'' ?>">
            <a href="/admin/users">
                <i class="icon-user-1"></i>
                <span class="ml-1 d-none d-md-block">Users</span>
            </a>
        </li>
        <li class="px-1 position-relative d-block <?= $active=='contacts'?'active':'' ?>">
            <a href="/admin/contacts">
                <i class="icon-vcard"></i>
                <span class="ml-1 d-none d-md-block">Contacts</span>
            </a>
        </li>
    </ul>
</nav>