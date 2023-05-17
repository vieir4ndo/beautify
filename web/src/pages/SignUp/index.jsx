import React, { useCallback, useState } from 'react';
import {
  Container,
  Box,
  Grid,
  Button,
  TextField,
  Link,
  Typography,
  Paper
} from '@mui/material';
import { toast } from 'react-toastify';
import { userUri } from '../../routes/api';

const SignUp = () => {
  const [userInfo, setUserInfo] = useState({});

  const handleChange = useCallback(({ target }) => {
    const newValue = { [target.name]: target.value }
    setUserInfo({ ...userInfo, ...newValue })
  }, [userInfo, setUserInfo])

  const successSubmit = () => {
    toast.success('Cadastro efetuado com sucesso!');
    // redireciona
  }

  const errorSubmit = () => {
    toast.error('Ocorreu um erro!');
  }

  const onSubmit = useCallback(async (event) => {
    // previne o reload da página
    event.preventDefault();

    fetch(userUri, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(userInfo)
    })
    .then(data => {
      if (data.ok) return data.json();

      throw new Error('Erro tal');
    })
    .then(successSubmit)
    .catch((err) => {
      console.log(err);
      errorSubmit();
    });
  }, [userInfo]);

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

          <form onSubmit={onSubmit}>
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
                  onChange={handleChange}
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
                  onChange={handleChange}
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
                  onChange={handleChange}
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
                  onChange={handleChange}
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
                  onChange={handleChange}
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