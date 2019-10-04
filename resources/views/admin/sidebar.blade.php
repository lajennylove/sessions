<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Menú
        </div>

        <div class="card-body">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ url('/admin') }}">
                        Index
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ url('/admin/byVotes') }}">
                        Ordenados por votos
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ url('/admin/byClicks') }}">
                        Ordenados por Clicks
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
    <br/>
</div>
