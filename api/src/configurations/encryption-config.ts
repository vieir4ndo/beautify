// it is recommended to not store encryption keys directly in config files, 
// it's better to use an environment variable or to use dotenv in order to load the value
export const MyEncryptionTransformerConfig = {
    //key: process.env.ENCRYPTION_KEY,
    key: 'e41c966f21f9e1577802463f8924e6a3fe3e9751f201304213b2f845d8841d61',
    algorithm: 'aes-256-gcm',
    ivLength: 16
};