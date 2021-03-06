<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Expense Tracker</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li {{{ explode('/', Request::path())[0] === 'budgets' ? 'class=active' : '' }}}>
                    <a href="/budgets">Budgets</a>
                </li>
                <li {{{ explode('/', Request::path())[0] === 'expenses' ? 'class=active' : '' }}}>
                    <a href="/expenses">Expenses</a>
                </li>
                <li {{{ explode('/', Request::path())[0] === 'expenseTypes' ? 'class=active' : '' }}}>
                    <a href="/expenseTypes">Expense Types</a>
                </li>
                <li {{{ explode('/', Request::path())[0] === 'incomes' ? 'class=active' : '' }}}>
                    <a href="/incomes">Incomes</a>
                </li>
                <li {{{ explode('/', Request::path())[0] === 'incomeTypes' ? 'class=active' : '' }}}>
                    <a href="/incomeTypes">Income Types</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a 
                        href="#" 
                        class="dropdown-toggle" 
                        data-toggle="dropdown" 
                        role="button" 
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Guest <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Register</a></li>                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>