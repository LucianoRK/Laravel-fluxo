import React from 'react';
import ReactDOM from 'react-dom';

function Start() {
    return (
        <div className="container">
            <div className="row">
                <p> Se você vê isso é pq seu Laravel e React estão configurados corretamente</p>
            </div>
            <div className="row">
                <p>( <i class="fas fa-thumbs-up info"></i> ) seus icones etão carregando</p>
            </div>
            <div class="btn-group row">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Se o botão estiver azul seu bootstrap.css esta carregando..
                    </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">E seu bootstrap.js também</a>
                </div>
            </div>
        </div>
    );
}

export default Start;

if (document.getElementById('start')) {
    ReactDOM.render(<Start />, document.getElementById('start'));
}
