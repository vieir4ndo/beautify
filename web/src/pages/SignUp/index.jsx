import React from 'react';

import Container from '@mui/material/Container';
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import Button from '@mui/material/Button';
import TextField from '@mui/material/TextField';
import Link from '@mui/material/Link';
import Typography from '@mui/material/Typography';
import Paper from '@mui/material/Paper';

const SignUp = () => {
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