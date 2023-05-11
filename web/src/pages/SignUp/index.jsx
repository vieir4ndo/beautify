import React from 'react';

import Container from '@mui/material/Container';
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import Button from '@mui/material/Button';
import TextField from '@mui/material/TextField';
import Link from '@mui/material/Link';
import Typography from '@mui/material/Typography';
import Paper from '@mui/material/Paper';
import { userUri } from '../../routes/api';

const SignUp = () => {

  async function onSubmit(form) {

    var body = {
      name: form.target.name.value,
      email: form.target.email.value,
      phoneNumber: form.target.phoneNumber.value,
      password: form.target.password.value,
      passwordConfirmation: form.target.passwordConfirmation.value
    };

    const response = await fetch(userUri, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    })

    await response.json();
    debugger;
  }

  return (
    <Box
      display="flex"
      justifyContent="center"
      alignItems="center"
      bgcolor="primary.main"
      style={{ minHeight: '100vh' }}
    >
      <Container maxWidth="sm">
        <Paper elevation={3} sx={{ padding: 8 }}>
          <Typography component="h1" variant="h5" sx={{ marginBottom: 4 }}>
            Cadastre-se
          </Typography>

          <form onSubmit={onSubmit} method='POST'>
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
                  name="phoneNumber"
                  variant="outlined"
                  id="phoneNumber"
                  label="Telefone"
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  required
                  fullWidth
                  name="password"
                  type="password"
                  variant="outlined"
                  id="password"
                  label="Senha"
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  required
                  fullWidth
                  name="passwordConfirmation"
                  type="password"
                  variant="outlined"
                  id="passwordConfirmation"
                  label="Confirmação de Senha"
                />
              </Grid>
            </Grid>
            <Button
              type="submit"
              fullWidth
              variant="contained"
              color="primary"
            >
              Cadastrar
            </Button>

            <Grid container justifyContent="center" sx={{ marginTop: 2 }}>
              <Grid item>
                <Link href="/" variant="body2">
                  Já tem uma conta? Faça login
                </Link>
              </Grid>
            </Grid>
          </form>
        </Paper>
      </Container>
    </Box>
  )
}

export default SignUp;