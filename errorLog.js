function logError(message, error) {
    const timestamp = new Date().toISOString();
    const logMessage = `${timestamp} - ${message}: ${error.toString()}\n`;
    
    // En una aplicación real, aquí se enviaría el error a un servicio de registro
    // Por ahora, solo lo imprimimos en la consola
    console.error(logMessage);
}