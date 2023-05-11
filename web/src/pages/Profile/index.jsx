import React from 'react';

import Container from '@mui/material/Container';
import Grid from '@mui/material/Grid';
import Button from '@mui/material/Button';
import TextField from '@mui/material/TextField';
import Typography from '@mui/material/Typography';

const SignUp = () => {
    return (
        <Container maxWidth="sm" sx={{marginTop: 4}}>
            <Typography component="h1" variant="h5" sx={{ marginBottom: 4 }}>
                Meu Perfil
            </Typography>

            <form>
                <Grid container spacing={2} sx={{ marginBottom: 4 }}>
                    <Grid item xs={12}>
                        <TextField
                            required
                            fullWidth
                            autoFocus
                            name="name"
                            variant="outlined"
                            id="name"
                            label="Nome completo"
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
                        />
                    </Grid>
                </Grid>
                <Button
                    type="submit"
                    fullWidth
                    variant="contained"
                    color="primary"
                >
                    Salvar
                </Button>
            </form>
        </Container>
    )
}

export default SignUp;