import React from 'react';
import { BrowserRouter as Router } from 'react-router-dom';
import { ThemeProvider, createTheme } from '@mui/material/styles';
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import PublicRoutes  from './routes/publicRoute';
import PrivateRoutes from './routes/privateRoute';
import beautifyTheme from './theme';

const theme = createTheme(beautifyTheme)

function MainComponent() {
  // temos que fazer autenticação
  let signed = true;

  if (!signed) return <PublicRoutes />

  return <PrivateRoutes />
}

function App() {
  return (
    <ThemeProvider theme={theme}>
      <ToastContainer />
      <Router>
        <MainComponent />
      </Router>
    </ThemeProvider>
  );
}

export default App;
