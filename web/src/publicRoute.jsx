import React from 'react';
import { Route, Routes, Navigate } from 'react-router-dom';

import SignIn from './pages/SignIn';

export default function PublicRoutes() {
  return (
    <Routes>
      <Route path="/" exact element={<SignIn />} />

      {/* Para qualquer rota não especificada, redireciona pra login */}
      <Route path="*" element={<Navigate to="/" />} />
    </Routes>
  );
}
