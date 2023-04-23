import React, { useState } from 'react';

import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import TopBar from './TopBar';
import SideBar from './SideBar';

import DashboardIcon from '@mui/icons-material/Dashboard';
import ErrorIcon from '@mui/icons-material/Error';

const drawerWidth = 240;

const BaseTemplate = ({ children }) => {
  // Controle de estado de abertura do Drawer pra mobile
  const [mobileOpen, setMobileOpen] = useState(false);
  const handleDrawerToggle = () => setMobileOpen(!mobileOpen);

  const links = [
    {
      name: 'Inicial',
      icon: DashboardIcon,
      to: '/'
    },
    {
      name: 'Erro',
      icon: ErrorIcon,
      to: '/lalala'
    }
  ];

  return (
    <Box sx={{ display: 'flex' }}>
      <TopBar
        drawerWidth={drawerWidth}
        handleDrawerToggle={handleDrawerToggle}
      />

      {/* SideBar */}
      <SideBar
        drawerWidth={drawerWidth}
        mobileOpen={mobileOpen}
        handleDrawerToggle={handleDrawerToggle}
        items={links}
      />

      {/* Conteúdo da página */}
      <Box
        component="main"
        sx={{ flexGrow: 1, p: 3, width: { sm: `calc(100% - ${drawerWidth}px)` } }}
      >
        <Toolbar />
        { children }
      </Box>
    </Box>
  );
}

export default BaseTemplate;