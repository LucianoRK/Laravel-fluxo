import React from 'react';
import ReactDOM from 'react-dom';

import Routes from './routes';

function Start() {
    return (
        <div className="container">
            <Routes />
        </div>
    );
}

export default Start;

if (document.getElementById('start')) {
    ReactDOM.render(<Start />, document.getElementById('start'));
}
