import React, { Suspense, lazy } from 'react';
import { Route, Routes } from 'react-router-dom';
import CssBaseline from '@mui/material/CssBaseline';

import BaseTemplate from './components/BaseTemplate';

const DashboardComponent = lazy(() => import ('./pages/Dashboard') )
const NotFoundComponent = lazy(() => import ('./pages/NotFound') )

function AppRoutes() {
  return (
    <Suspense fallback={<div>Loading...</div>}>
      <Routes>
        <Route path="/" element={<DashboardComponent />} exact />
        <Route path="*" element={<NotFoundComponent />} />
      </Routes>
    </Suspense>
  );
}

export default function PrivateRoutes() {
  return(
    <>
      <CssBaseline />
      <BaseTemplate>
        <AppRoutes />
      </BaseTemplate>
    </>
  );
}
