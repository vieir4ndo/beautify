import React from 'react';

import AppBar from '@mui/material/AppBar';
import Toolbar from '@mui/material/Toolbar';
import IconButton from '@mui/material/IconButton';
import Avatar from '@mui/material/Avatar';

import UserIcon from '@mui/icons-material/Person';
import MenuIcon from '@mui/icons-material/Menu';

const TopBar = ({ drawerWidth, handleDrawerToggle }) => {

  return (
    <AppBar
      position="fixed"
      sx={{
        width: { sm: `calc(100% - ${drawerWidth}px)` },
        ml: { sm: `${drawerWidth}px` },
      }}
    >
      <Toolbar
        sx={{
          flex: 1, justifyContent: {
            xs: 'space-between',
            sm: 'flex-end'
          }
        }}
      >
        <IconButton
          color="inherit"
          aria-label="Abrir menu"
          edge="start"
          onClick={handleDrawerToggle}
          sx={{ mr: 2, display: { sm: 'none' } }}
        >
          <MenuIcon />
        </IconButton>
        <IconButton href={'/perfil'}>
          <Avatar sx={{ bgcolor: '#ffffff' }} >
            <UserIcon sx={{ color: 'primary.main' }} />
          </Avatar>
        </IconButton>
      </Toolbar>
    </AppBar>
  )
}

export default TopBar;