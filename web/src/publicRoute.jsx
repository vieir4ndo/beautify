import React from 'react';
import { Route, Routes, Navigate } from 'react-router-dom';

import SignIn from './pages/SignIn';
import SignUp from './pages/SignUp';

export default function PublicRoutes() {
  return (
    <Routes>
      <Route path="/" exact element={<SignIn />} />
      <Route path="/cadastro" exact element={<SignUp />} />

      {/* Para qualquer rota não especificada, redireciona pra login */}
      <Route path="*" element={<Navigate to="/" />} />
    </Routes>
  );
}
