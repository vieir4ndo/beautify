const white = {
  light: '#FFF',
  main: '#FFF',
  dark: '#CCCCCC',
  contrastText: '#1B2430',
};

const primary = {
  light: '#FBE5E5',
  main: '#FECACA',
  dark: '#FBADAD',
  contrastText: '#FFF',
};

const secondary = {
  light: '#85dee7',
  main: '#3BC6D6',
  dark: '#29acbd',
  contrastText: '#FFF',
};

const blue = {
  light: '#4791db',
  main: '#1976d2',
  dark: '#115293',
  contrastText: '#FFF',
};

const green = {
  light: '#81C784',
  main: '#4CAF50',
  dark: '#388E3C',
  contrastText: '#FFF',
};

const orange = {
  light: '#FF9800',
  main: '#FF9800',
  dark: '#C66900',
  contrastText: '#FFF',
};

const red = {
  light: '#FF908A',
  main: '#FE5D5D',
  dark: '#C52533',
  contrastText: '#FFF',
};

const rose = {
  light: '#FF60FF',
  main: '#FA00E1',
  dark: '#C300AE',
  contrastText: '#FFF',
};

const grey = {
  light: '#9E9D9D',
  main: '#706F6F',
  dark: '#454444',
  contrastText: '#FFF',
};

const purple = {
  light: '#7F65BC',
  main: '#4F3A8B',
  dark: '#1F125D',
  contrastText: '#FFF',
};

const black = {
  light: '#434C59',
  main: '#1B2430',
  dark: '#000007',
  contrastText: '#FFF',
};

const info = {
  light: '#64b5f6',
  main: '#2196f3',
  dark: '#1976d2',
  contrastText: '#ffffff',
};

const error   = red
const warning = orange
const success = green

const theme = {
  typography: {
    'fontFamily': `'Montserrat', sans-serif`,
  },
  palette: {
    primary,   /*usada para representar os elementos de interface primários para um usuário. É a cor mais frequentemente exibida nas telas e componentes do seu aplicativo.*/
    secondary, /*usada para representar os elementos de interface secundários para um usuário. Ela fornece mais maneiras de realçar e distinguir o seu produto. Tê-la é opcional.*/
    error,     /*usada para representar os elementos de interface dos quais o usuário deve estar ciente.*/
    warning,   /*usada para representar possíveis ações perigosas ou mensagens importantes.*/
    success,   /*usada para indicar a conclusão bem-sucedida de uma ação que o usuário acionou.*/
    info,      /*usada para apresentar ao usuário informações neutras e não necessariamente importantes.*/
    blue,
    purple,
    green,
    orange,
    red,
    black,
    grey,
    rose,
    white
  }
};

export default theme;