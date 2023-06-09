import React, { useState, useEffect } from 'react';
import Container from '@mui/material/Container';
import Grid from '@mui/material/Grid';
import Button from '@mui/material/Button';
import TextField from '@mui/material/TextField';
import Typography from '@mui/material/Typography';
import { userUri } from '../../routes/api';

const SignUp = () => {

    const [userInfo, setUserInfo] = useState({});

    const getUserInfo = () => {
        let userId = localStorage.getItem('@beautify-user');
        fetch(`${userUri}/${userId}`, {
            method: 'GET',
            headers: { 'Content-Type': 'application/json' }
        }).then(data => {
            return data.json()
        }).then(data => {
            setUserInfo(data.data)
        }).catch(err => {
            console.log(err)
        })
    }

    useEffect(() => {
        getUserInfo();
    }, []);

    return (
        <Container maxWidth="sm" sx={{ marginTop: 4 }}>
            <Typography component="h1" variant="h5" sx={{ marginBottom: 4 }}>
                Meu Perfil
            </Typography>

            <form>
                <Grid container spacing={2} sx={{ marginBottom: 4 }}>
                    <Grid item xs={12}>
                        <TextField
                            required
                            fullWidth
                            name="name"
                            variant="outlined"
                            id="name"
                            label="Nome completo"
                            value={userInfo.name ?? ''}
                            InputProps={{
                                disabled: true,
                            }}
                        />
                    </Grid>
                    <Grid item xs={12}>
                        <TextField
                            required
                            fullWidth
                            name="email"
                            type="email"
                            variant="outlined"
                            id="email"
                            label="E-mail"
                            value={userInfo.email ?? ''}
                            InputProps={{
                                disabled: true,
                            }}
                        />
                    </Grid>
                    <Grid item xs={12}>
                        <TextField
                            required
                            fullWidth
                            name="telephone"
                            variant="outlined"
                            id="telephone"
                            label="Telefone"
                            value={userInfo.phoneNumber ?? ''}
                            InputProps={{
                                disabled: true,
                            }}
                        />
                    </Grid>
                </Grid>
                <Button
                    type="submit"
                    fullWidth
                    variant="contained"
                    color="primary"
                    sx={{ display: 'none' }}
                >
                    Salvar
                </Button>
            </form>
        </Container>
    )
}

export default SignUp;