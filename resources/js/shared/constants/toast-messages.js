import {ToastTypeMessage} from './toast-type-message';
import {ToastSeverityMessage} from './toast-severity-message';

export const ToastsMessages = [
  {
    title: ToastTypeMessage.LOGIN_SUCCESS,
    severity: ToastSeverityMessage.SUCCESS,
    summary: 'Sesión Iniciada',
    detail: 'Credenciales correctas'
  },
  {
    title: ToastTypeMessage.LOGIN_ERROR,
    severity: ToastSeverityMessage.ERROR,
    summary: 'Oops! Hubo un problema',
    detail: 'Las credenciales son incorrectas'
  },
  {
    title: ToastTypeMessage.USER_NOT_LOGGED,
    severity: ToastSeverityMessage.ERROR,
    summary: 'Oops! Hubo un problema',
    detail: 'Aun no has iniciado sesión'
  },
  {
    title: ToastTypeMessage.TOKEN_EXPIRED_OR_INVALID,
    severity: ToastSeverityMessage.ERROR,
    summary: 'Token Expirado o Inválido',
    detail: 'Es necesario un nuevo inicio de sesión'
  },
  {
    title: ToastTypeMessage.ALREADY_AUTHENTICATED,
    severity: ToastSeverityMessage.ERROR,
    summary: 'Oops! Hubo un problema',
    detail: 'Ya has iniciado sesión'
  },
  {
    title: ToastTypeMessage.FORM_ERROR,
    severity: ToastSeverityMessage.WARN,
    summary: 'Advertencia',
    detail: 'Los campos no están rellenados correctamente'
  },

]

