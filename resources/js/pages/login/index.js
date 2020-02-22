import React, { useState } from 'react';

import Logo from '../../assets/imgs/logo.png';
import './styles.css';

export default function Login({ history }) {
    const [user, setUser] = useState('');
    const [password, setPassword] = useState('');

    async function handleSubmit(event) {
        event.preventDefault();

        history.push('/dashboard');
    }

    return (
        <div className="container vertical-center backgroundLogin">
            <div className="horizontal-center col-md-4 offset-md-0">
                <form onSubmit={handleSubmit}>
                    <div align="center" id="logologin">
                        <img src={Logo} alt="Logo" />
                    </div>

                    <div className="form-group">
                        <input type="user" className="form-control form-control-lg text-center" id="user" placeholder="Usuário" value={user} onChange={event => setUser(event.target.value)} />
                    </div>
                    
                    <div className="form-group">
                        <input type="password" className="form-control form-control-lg text-center" id="password" placeholder="Senha" value={password} onChange={event => setPassword(event.target.value)} />
                    </div>
                    <button type="submit" className="btn btn-primary btn-lg btn-block">ENTRAR</button>
                </form>
            </div>
        </div>
    );
}